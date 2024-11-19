<?php

namespace CakePHPOpencart;

use Cake\Core\Configure;
use Cake\Http\Exception\InternalErrorException;

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
     * Listens to every Model.initialize. Skips models not in this plugin.
     * And every model inside this plugin is prepared.
     *
     * (Prepared means using the right connection and entity class.)
     *
     * @param Cake\Event\Event $event a Model.initialize event
     * @throws \Exception
     */
    public function onEveryModelInitialize($event)
    {
        // Get table class that was just initialised
        $table = $event->getSubject();
        // The registry alias is in Plugin.Model format; split it
        list($plugin, $tableAlias) = pluginSplit($table->getRegistryAlias());
        // Skip right away if this is not a model inside this plugin
        if ($plugin !== $this->getName()) {
            return;
        }
        // Throw exception if no datasource to use has been set yet
        if (empty($this->getDatasource())) {
            throw new \Exception(
                'No data source was set for '.$this->getName()
            );
        }
        // Make sure the table uses the right connection
        $datasource = $this->getDatasource();
        $connection = \Cake\Datasource\ConnectionManager::get($datasource);
        $table->setConnection($connection);
        unset($datasource, $connection);
        // Make sure the table uses the right entity class
        $this->_attachEntity($table);
        // Specify language_id in associations to translation classes
        foreach ($table->associations() as $association) {
            /*
            Opencart stores translations in tables with suffix "_description",
            but bake doesn't automatically pick that relation up. So we manually
            associated translatable items (in their respective table classes) as
            - hasMany Descriptions for selects containing all languages
            - hasOne  Description  for selecting default language translations
            Default language is configured dynamically using plugin config and
            is used below to create a condition for selecting right translation
            */
            if (substr($association->getName(), -11) == 'Description'
            && empty($association->getConditions())) {
                $association->setConditions([
                    $association->getName().'.language_id' => $this->getLanguageId()
                ]);
            }
        }
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
            $cartSymbol = Configure::read($this->getName().'.defaultSite');
        }
        // If still nothing, throw an exception
        if (empty($cartSymbol)) {
            throw new InternalErrorException('Cart symbol not provided');
        }
        // Get the carts list from the config
        $carts = Configure::read($this->getName().'.siteList');
        if (!$carts || !is_array($carts) || empty($carts)) {
            throw new InternalErrorException('No carts configured');
        }
        $cartSymbol = strtoupper($cartSymbol);
        if (!isset($carts[$cartSymbol])) {
            throw new InternalErrorException(sprintf(
                'No cart configured for symbol %s. Available symbols: %s',
                $cartSymbol, implode(', ', array_keys($carts))
            ));
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
        // Listen to every Model.initialize (filters irrelevant out later)
        \Cake\Event\EventManager::instance()->on('Model.initialize', [$this, 'onEveryModelInitialize']);
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
        // Make sure table is looked up in cart type folder
        $tableLocator->addLocation('Model/Table/'.$this->getType());
        $tableIdentifier = $this->_locateModelClass($tableName, 'Table');
        // If the table class found is located in App itself
        if (strpos($tableIdentifier, '/') !== false) {
            // Drop table class name, keep only location
            $tableLocation = dirname($tableIdentifier);
            // Make locator aware of location where table class was found
            $tableLocator->addLocation('Model/Table/'.$tableLocation);
            // Since we're on App level, look up table by its name only
            $tableIdentifier = $tableName;
        }
        // Get the table
        $table = $tableLocator->get($tableIdentifier, [
            // Always ensure we're using connection configured for this plugin
            'connectionName' => $this->getDatasource()
            // …otherwise contained table may default to app's connection
        ]);
        if (get_class($table) == 'Cake\ORM\Table') {
            throw new InternalErrorException(sprintf('Requested table %s resolves to generic %s. Make sure a concrete table class exists in %s', $tableName, get_class($table), $this->getPath().'src/Model/Table'));
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
        // Find the entity location
        $entityLocation = $this->_locateModelClass($entityName, 'Entity');
        // Attempt to set the entity class only if it exists
        if ($entityLocation) {
            $table->setEntityClass($entityLocation);
        }
    }

    /**
     * Tries various class locations for given model (entity or table) name
     *
     * @param string $name model we're looking for; no Table suffix for tables
     * @param string $dir Entity|Table
     * @return string|null CakePHP-compatible class alias in dot notation or not
     */
    private function _locateModelClass($name, $dir)
    {
        // Allow only Entity or Table as $dir values
        if (!in_array($dir, ['Entity', 'Table'])) {
            throw new \Exception(sprintf(
                '$dir needs to be either Entity or Table, received "%s"', $dir
            ));
        }
        // className() looks for exact file names, so add suffix for tables
        $lookup_name = $name . ($dir == 'Table' ? 'Table' : '');
        // If no local path configured, use only entity name, don't look further
        if (empty($this->getLocalPath())) {
            return $name;
        }
        /*
         * From the outside we refer to model files here in this plugin as e.g.:
         * - CakePHPOpencart\Model\Entity\Order
         * - CakePHPOpencart\Model\Table\OrdersTable
         * In other words, no mention of cart type, i.e. if it's Opencart 2 or 4
         */
        // Build cart type-agnostic class alias we will be referring to
        $classAlias = sprintf('%s\Model\%s\%s', $this->getName(), $dir, $lookup_name);
        // Internally, the real class path depends on cart type from the config
        $realClassPath = sprintf('%s\Model\%s\%s\%s', $this->getName(), $dir, $this->getType(), $lookup_name);
        // Only if the alias has not been declared yet and the real class exists
        if (!\class_exists($classAlias) && \class_exists($realClassPath)) {
            //...link the "external" class alias to the real internal class path
            \class_alias($realClassPath, $classAlias);
            // This sets up Opencart version-agnostic alias we look up below
            // Actual version is picked up automatically from the config
        }
        // Local path is where overriding classes *may* be stored in App itself
        $path = trim($this->getLocalPath(), '/') . '/' . $lookup_name;
        // See if overriding model class has been created in App itself
        if (\Cake\Core\App::className($path, 'Model/'.$dir)) {
            return $path;
        }
        unset($path);
        // See if the entity exists in this plugin
        if (\Cake\Core\App::className($this->getName().'.'.$lookup_name, 'Model/'.$dir)) {
            return $this->getName().'.'.$name;
        }
        // Finally, just have CakePHP look for an entity by its name
        if (\Cake\Core\App::className($lookup_name, 'Model/'.$dir)) {
            return $name;
        }
        return null;
    }

}
