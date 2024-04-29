<?php

namespace CakePHPOpencart;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Core\PluginApplicationInterface;
use Cake\Http\Exception\BadRequestException;

class Connector extends Plugin
{

    private $_symbol;
    private $_CartName;
    private $_datasource;
    private $_type;
    private $_localPath;
    private $_languageId;

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->_symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->_symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getCartName()
    {
        return $this->_CartName;
    }

    /**
     * @param string $name
     */
    public function setCartName($name)
    {
        $this->_CartName = $name;
    }

    /**
     * @return string
     */
    public function getDatasource()
    {
        return $this->_datasource;
    }

    /**
     * @param string $datasource
     */
    public function setDatasource($datasource)
    {
        $this->_datasource = $datasource;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @return mixed
     */
    public function getLocalPath()
    {
        return $this->_localPath;
    }

    /**
     * @param mixed $localPath
     */
    public function setLocalPath($localPath)
    {
        $this->_localPath = $localPath;
    }

    /**
     * @return mixed
     */
    public function getLanguageId()
    {
        return $this->_languageId;
    }

    /**
     * @param mixed $language_Id
     */
    public function setLanguageId($languageId)
    {
        $this->_languageId = $languageId;
    }

    /**
     * Connector constructor.
     *
     * @param null $cartSymbol identifies the cart to load from the config
     */
    public function __construct($cartSymbol=null)
    {
        // If none provided, see if a default is configured on the app level
        if (empty($cartSymbol)) {
            $cartSymbol = Configure::read($this->getName().'.defaultCart');
        }
        // If still nothing, throw an exception
        if (empty($cartSymbol)) {
            throw new BadRequestException('Cart symbol not provided');
        }
        // Get the carts list from the config
        $carts = Configure::read($this->getName().'.cartList');
        if (!$carts || !is_array($carts) || empty($carts)) {
            return;
        }
        $cartSymbol = strtoupper($cartSymbol);
        if (!isset($carts[$cartSymbol])) {
            return;
        }
        $cart = $carts[$cartSymbol];
        // Set the configured values
        $this->setSymbol($cartSymbol);
        $this->setCartName($cart['name']);
        $this->setDatasource($cart['datasource']);
        $this->setType($cart['type']);
        // If overriding model classes on App level place them in this subfolder
        if (!empty($cart['localPath'])) {
            $this->setLocalPath($cart['localPath']);
        }
        if (!empty($cart['languageId'])) {
            $this->setLanguageId($cart['languageId']);
        }
    }

    /**
     * Returns the model table class
     *
     * @param $tableName coming from calls such as $cart->Table
     * @return \Cake\ORM\Table
     */
    public function __get($tableName)
    {
        $tableRegistry = new \Cake\ORM\TableRegistry();
        $tableLocator = $tableRegistry->getTableLocator();
        // Make sure the table is looked up in the right place
        $tableLocator->addLocation('Model/Table/'.$this->getType());
        // Get the table
        $table = $tableLocator->get($this->getName().'.'.$tableName);
        if (get_class($table) == 'Cake\ORM\Table') {
            throw new \Cake\Core\Exception\Exception(sprintf('Requested table %s resolves to generic %s. Make sure a concrete table class exists in %s', $tableName, get_class($table), $this->getPath().'src/Model/Table'));
        }
        // Attach the entity class
        $this->_attachEntity($table);
        // Set the connection
        $connection = \Cake\Datasource\ConnectionManager::get($this->getDatasource());
        $table->setConnection($connection);
        foreach ($table->associations() as $association) {
            if (substr($association->getName(), -11) == 'Description'
            && empty($association->getConditions())) {
                $association->setConditions([
                    $association->getName().'.language_id' => $this->getLanguageId()
                ]);
            }
            // Ensure associated table uses the same datasource/connection
            $association->setConnection($association->getSource()->getConnection());
            // Ensure associated table looks for matching entity
            $this->_attachEntity($association->getTarget());
        }
        return $table;
    }

    /**
     * Looks for matching entity for given table class
     *
     * @param \Cake\ORM\Table $table class to attach an entity to
     * @return void
     */
    private function _attachEntity($table)
    {
        // If $table comes from association, getAlias() won't get us real table name
        // (E.g. we will be getting PaymentCountries instead of Countries)
        // So use getTable() to get the original database table name instead
        $tableName = $table->getTable();
        // Convert plural table name to singular entity name
        $entityName = \Cake\Utility\Inflector::classify(\Cake\Utility\Inflector::underscore($tableName));
        // From the outside we refer to entities here as CakePHPOpencart\Model\Entity\Order
        $classAlias = sprintf('%s\Model\Entity\%s', $this->getName(), $entityName);
        // Internally, the real entity path depends on cart type from the config
        $realClassPath = sprintf('%s\Model\Entity\%s\%s', $this->getName(), $this->getType(), $entityName);
        // Only if the alias has not been declared yet and the real class exists
        if (!\class_exists($classAlias) && \class_exists($realClassPath)) {
            //...link the "external" class alias to the real internal class path
            \class_alias($realClassPath, $classAlias);
        }
        // Find the entity location
        $entityLocation = $this->_locateEntity($entityName);
        // Attempt to set the entity class only if it exists
        if ($entityLocation) {
            $table->setEntityClass($entityLocation);
        }
    }

    /**
     * Tries various entity class locations for given entity name
     *
     * @param $entityName
     * @return string|null CakePHP-compatible class alias in dot notation or not
     */
    private function _locateEntity($entityName)
    {
        $entityPath = $entityName;
        // If no entity path is configured, use only the entity name
        if (empty($this->getLocalPath())) {
            return $entityPath;
        }
        // Local path is where overriding classes may be stored in App itself
        $entityPath = trim($this->getLocalPath(), '/') . '/' . $entityPath;
        // See if overriding entity has been created on the App level
        if (\Cake\Core\App::className($entityPath, 'Model/Entity')) {
            return $entityPath;
        }
        unset($entityPath);
        // See if the entity exists in this plugin
        if (\Cake\Core\App::className($this->getName().'.'.$entityName, 'Model/Entity')) {
            return $this->getName().'.'.$entityName;
        }
        // Finally, just have CakePHP look for an entity by its name
        if (\Cake\Core\App::className($entityName, 'Model/Entity')) {
            return $entityName;
        }
        return null;
    }

}
