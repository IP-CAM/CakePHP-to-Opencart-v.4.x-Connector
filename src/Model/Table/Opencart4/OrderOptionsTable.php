<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderOptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrderProductsTable&\Cake\ORM\Association\BelongsTo $OrderProducts
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductOptionsTable&\Cake\ORM\Association\BelongsTo $ProductOptions
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductOptionValuesTable&\Cake\ORM\Association\BelongsTo $ProductOptionValues
 *
 * @method \CakePHPOpencart\Model\Entity\OrderOption get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderOption newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderOption[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderOption|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderOption saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderOption patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderOption[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderOption findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderOptionsTable extends Table
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

        $this->setTable('order_option');
        $this->setDisplayField('name');
        $this->setPrimaryKey('order_option_id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Orders',
        ]);
        $this->belongsTo('OrderProducts', [
            'foreignKey' => 'order_product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.OrderProducts',
        ]);
        $this->belongsTo('ProductOptions', [
            'foreignKey' => 'product_option_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ProductOptions',
        ]);
        $this->belongsTo('ProductOptionValues', [
            'foreignKey' => 'product_option_value_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ProductOptionValues',
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
            ->integer('order_option_id')
            ->allowEmptyString('order_option_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('type')
            ->maxLength('type', 32)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

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
        $rules->add($rules->existsIn(['order_product_id'], 'OrderProducts'));
        $rules->add($rules->existsIn(['product_option_id'], 'ProductOptions'));
        $rules->add($rules->existsIn(['product_option_value_id'], 'ProductOptionValues'));

        return $rules;
    }

}
