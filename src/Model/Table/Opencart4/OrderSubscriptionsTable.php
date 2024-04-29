<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderSubscriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrderProductsTable&\Cake\ORM\Association\BelongsTo $OrderProducts
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionPlansTable&\Cake\ORM\Association\BelongsTo $SubscriptionPlans
 *
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderSubscription findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderSubscriptionsTable extends Table
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

        $this->setTable('order_subscription');
        $this->setDisplayField('order_subscription_id');
        $this->setPrimaryKey('order_subscription_id');

        $this->belongsTo('OrderProducts', [
            'foreignKey' => 'order_product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.OrderProducts',
        ]);
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
        $this->belongsTo('SubscriptionPlans', [
            'foreignKey' => 'subscription_plan_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.SubscriptionPlans',
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
            ->integer('order_subscription_id')
            ->allowEmptyString('order_subscription_id', null, 'create');

        $validator
            ->decimal('trial_price')
            ->requirePresence('trial_price', 'create')
            ->notEmptyString('trial_price');

        $validator
            ->decimal('trial_tax')
            ->requirePresence('trial_tax', 'create')
            ->notEmptyString('trial_tax');

        $validator
            ->scalar('trial_frequency')
            ->requirePresence('trial_frequency', 'create')
            ->notEmptyString('trial_frequency');

        $validator
            ->requirePresence('trial_cycle', 'create')
            ->notEmptyString('trial_cycle');

        $validator
            ->requirePresence('trial_duration', 'create')
            ->notEmptyString('trial_duration');

        $validator
            ->requirePresence('trial_remaining', 'create')
            ->notEmptyString('trial_remaining');

        $validator
            ->boolean('trial_status')
            ->requirePresence('trial_status', 'create')
            ->notEmptyString('trial_status');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->decimal('tax')
            ->requirePresence('tax', 'create')
            ->notEmptyString('tax');

        $validator
            ->scalar('frequency')
            ->requirePresence('frequency', 'create')
            ->notEmptyString('frequency');

        $validator
            ->requirePresence('cycle', 'create')
            ->notEmptyString('cycle');

        $validator
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

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
        $rules->add($rules->existsIn(['order_product_id'], 'OrderProducts'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['subscription_plan_id'], 'SubscriptionPlans'));

        return $rules;
    }

}
