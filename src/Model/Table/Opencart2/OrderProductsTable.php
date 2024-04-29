<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderProducts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \CakePHPOpencart\Model\Entity\OrderProduct get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderProduct newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderProduct[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderProductsTable extends Table
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

        $this->setTable('order_product');
        $this->setDisplayField('name');
        $this->setPrimaryKey('order_product_id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Orders',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('order_product_id')
            ->allowEmptyString('order_product_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('model')
            ->maxLength('model', 64)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->decimal('price')
            ->notEmptyString('price');

        $validator
            ->decimal('total')
            ->notEmptyString('total');

        $validator
            ->decimal('tax')
            ->notEmptyString('tax');

        $validator
            ->integer('reward')
            ->requirePresence('reward', 'create')
            ->notEmptyString('reward');

        return $validator;
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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }

}
