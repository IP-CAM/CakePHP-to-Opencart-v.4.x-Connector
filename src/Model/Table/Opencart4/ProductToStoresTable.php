<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductToStores Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\ProductToStore get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToStore newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToStore[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToStore[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToStore findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductToStoresTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('product_to_store');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'store_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }

}
