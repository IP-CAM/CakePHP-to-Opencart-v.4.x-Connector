<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Subscriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrderProductsTable&\Cake\ORM\Association\BelongsTo $OrderProducts
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart4\PaymentAddressesTable&\Cake\ORM\Association\BelongsTo $PaymentAddresses
 * @property \CakePHPOpencart\Model\Table\Opencart4\ShippingAddressesTable&\Cake\ORM\Association\BelongsTo $ShippingAddresses
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionPlansTable&\Cake\ORM\Association\BelongsTo $SubscriptionPlans
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionStatusesTable&\Cake\ORM\Association\BelongsTo $SubscriptionStatuses
 * @property \CakePHPOpencart\Model\Table\Opencart4\AffiliatesTable&\Cake\ORM\Association\BelongsTo $Affiliates
 * @property \CakePHPOpencart\Model\Table\Opencart4\MarketingsTable&\Cake\ORM\Association\BelongsTo $Marketings
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \CakePHPOpencart\Model\Table\Opencart4\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrderTable&\Cake\ORM\Association\BelongsToMany $Order
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \CakePHPOpencart\Model\Entity\Subscription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Subscription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Subscription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Subscription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Subscription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Subscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Subscription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Subscription findOrCreate($search, callable $callback = null, $options = [])
 */
class SubscriptionsTable extends Table
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

        $this->setTable('subscription');
        $this->setDisplayField('subscription_id');
        $this->setPrimaryKey('subscription_id');

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
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
        ]);
        $this->belongsTo('PaymentAddresses', [
            'foreignKey' => 'payment_address_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.PaymentAddresses',
        ]);
        $this->belongsTo('ShippingAddresses', [
            'foreignKey' => 'shipping_address_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ShippingAddresses',
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
        $this->belongsTo('SubscriptionStatuses', [
            'foreignKey' => 'subscription_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.SubscriptionStatuses',
        ]);
        $this->belongsTo('Affiliates', [
            'foreignKey' => 'affiliate_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Affiliates',
        ]);
        $this->belongsTo('Marketings', [
            'foreignKey' => 'marketing_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Marketings',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
        ]);
        $this->belongsTo('Currencies', [
            'foreignKey' => 'currency_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Currencies',
        ]);
        $this->belongsToMany('Order', [
            'foreignKey' => 'subscription_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'order_subscription',
            'className' => 'CakePHPOpencart.Order',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'subscription_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'product_subscription',
            'className' => 'CakePHPOpencart.Product',
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
            ->integer('subscription_id')
            ->allowEmptyString('subscription_id', null, 'create');

        $validator
            ->scalar('payment_method')
            ->requirePresence('payment_method', 'create')
            ->notEmptyString('payment_method');

        $validator
            ->scalar('shipping_method')
            ->requirePresence('shipping_method', 'create')
            ->notEmptyString('shipping_method');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->decimal('trial_price')
            ->requirePresence('trial_price', 'create')
            ->notEmptyString('trial_price');

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
            ->scalar('frequency')
            ->requirePresence('frequency', 'create')
            ->notEmptyString('frequency');

        $validator
            ->requirePresence('cycle', 'create')
            ->notEmptyString('cycle');

        $validator
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->requirePresence('remaining', 'create')
            ->notEmptyString('remaining');

        $validator
            ->dateTime('date_next')
            ->requirePresence('date_next', 'create')
            ->notEmptyDateTime('date_next');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->scalar('tracking')
            ->maxLength('tracking', 64)
            ->requirePresence('tracking', 'create')
            ->notEmptyString('tracking');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->scalar('forwarded_ip')
            ->maxLength('forwarded_ip', 40)
            ->requirePresence('forwarded_ip', 'create')
            ->notEmptyString('forwarded_ip');

        $validator
            ->scalar('user_agent')
            ->maxLength('user_agent', 255)
            ->requirePresence('user_agent', 'create')
            ->notEmptyString('user_agent');

        $validator
            ->scalar('accept_language')
            ->maxLength('accept_language', 255)
            ->requirePresence('accept_language', 'create')
            ->notEmptyString('accept_language');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        $validator
            ->dateTime('date_modified')
            ->requirePresence('date_modified', 'create')
            ->notEmptyDateTime('date_modified');

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
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['payment_address_id'], 'PaymentAddresses'));
        $rules->add($rules->existsIn(['shipping_address_id'], 'ShippingAddresses'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['subscription_plan_id'], 'SubscriptionPlans'));
        $rules->add($rules->existsIn(['subscription_status_id'], 'SubscriptionStatuses'));
        $rules->add($rules->existsIn(['affiliate_id'], 'Affiliates'));
        $rules->add($rules->existsIn(['marketing_id'], 'Marketings'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));

        return $rules;
    }

}
