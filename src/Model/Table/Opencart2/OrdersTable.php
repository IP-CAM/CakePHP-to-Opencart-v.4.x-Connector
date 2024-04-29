<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 * @property \CakePHPOpencart\Model\Table\Opencart2\PaymentCountriesTable&\Cake\ORM\Association\BelongsTo $PaymentCountries
 * @property \CakePHPOpencart\Model\Table\Opencart2\PaymentZonesTable&\Cake\ORM\Association\BelongsTo $PaymentZones
 * @property \CakePHPOpencart\Model\Table\Opencart2\ShippingCountriesTable&\Cake\ORM\Association\BelongsTo $ShippingCountries
 * @property \CakePHPOpencart\Model\Table\Opencart2\ShippingZonesTable&\Cake\ORM\Association\BelongsTo $ShippingZones
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrderStatusesTable&\Cake\ORM\Association\BelongsTo $OrderStatuses
 * @property \CakePHPOpencart\Model\Table\Opencart2\AffiliatesTable&\Cake\ORM\Association\BelongsTo $Affiliates
 * @property \CakePHPOpencart\Model\Table\Opencart2\MarketingsTable&\Cake\ORM\Association\BelongsTo $Marketings
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \CakePHPOpencart\Model\Table\Opencart2\CurrenciesTable&\Cake\ORM\Association\BelongsTo $Currencies
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldTable&\Cake\ORM\Association\BelongsToMany $CustomField
 * @property \CakePHPOpencart\Model\Table\Opencart2\OptionTable&\Cake\ORM\Association\BelongsToMany $Option
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 * @property \CakePHPOpencart\Model\Table\Opencart2\RecurringTable&\Cake\ORM\Association\BelongsToMany $Recurring
 * @property \CakePHPOpencart\Model\Table\Opencart2\VoucherTable&\Cake\ORM\Association\BelongsToMany $Voucher
 *
 * @method \CakePHPOpencart\Model\Entity\Order get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Order newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Order|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Order[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Order findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('order');
        $this->setDisplayField('order_id');
        $this->setPrimaryKey('order_id');

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
        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
        ]);
        $this->belongsTo('PaymentCountries', [
            'foreignKey' => 'payment_country_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.PaymentCountries',
        ]);
        $this->belongsTo('PaymentZones', [
            'foreignKey' => 'payment_zone_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.PaymentZones',
        ]);
        $this->belongsTo('ShippingCountries', [
            'foreignKey' => 'shipping_country_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ShippingCountries',
        ]);
        $this->belongsTo('ShippingZones', [
            'foreignKey' => 'shipping_zone_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ShippingZones',
        ]);
        $this->belongsTo('OrderStatuses', [
            'foreignKey' => 'order_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.OrderStatuses',
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
        $this->belongsToMany('CustomField', [
            'foreignKey' => 'order_id',
            'targetForeignKey' => 'custom_field_id',
            'joinTable' => 'order_custom_field',
            'className' => 'CakePHPOpencart.CustomField',
        ]);
        $this->belongsToMany('Option', [
            'foreignKey' => 'order_id',
            'targetForeignKey' => 'option_id',
            'joinTable' => 'order_option',
            'className' => 'CakePHPOpencart.Option',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'order_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'order_product',
            'className' => 'CakePHPOpencart.Product',
        ]);
        $this->belongsToMany('Recurring', [
            'foreignKey' => 'order_id',
            'targetForeignKey' => 'recurring_id',
            'joinTable' => 'order_recurring',
            'className' => 'CakePHPOpencart.Recurring',
        ]);
        $this->belongsToMany('Voucher', [
            'foreignKey' => 'order_id',
            'targetForeignKey' => 'voucher_id',
            'joinTable' => 'order_voucher',
            'className' => 'CakePHPOpencart.Voucher',
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
            ->integer('order_id')
            ->allowEmptyString('order_id', null, 'create');

        $validator
            ->integer('invoice_no')
            ->notEmptyString('invoice_no');

        $validator
            ->scalar('invoice_prefix')
            ->maxLength('invoice_prefix', 26)
            ->requirePresence('invoice_prefix', 'create')
            ->notEmptyString('invoice_prefix');

        $validator
            ->scalar('store_name')
            ->maxLength('store_name', 64)
            ->requirePresence('store_name', 'create')
            ->notEmptyString('store_name');

        $validator
            ->scalar('store_url')
            ->maxLength('store_url', 255)
            ->requirePresence('store_url', 'create')
            ->notEmptyString('store_url');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 32)
            ->requirePresence('firstname', 'create')
            ->notEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 32)
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 32)
            ->requirePresence('telephone', 'create')
            ->notEmptyString('telephone');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 32)
            ->requirePresence('fax', 'create')
            ->notEmptyString('fax');

        $validator
            ->scalar('custom_field')
            ->requirePresence('custom_field', 'create')
            ->notEmptyString('custom_field');

        $validator
            ->scalar('payment_firstname')
            ->maxLength('payment_firstname', 32)
            ->requirePresence('payment_firstname', 'create')
            ->notEmptyString('payment_firstname');

        $validator
            ->scalar('payment_lastname')
            ->maxLength('payment_lastname', 32)
            ->requirePresence('payment_lastname', 'create')
            ->notEmptyString('payment_lastname');

        $validator
            ->scalar('payment_company')
            ->maxLength('payment_company', 60)
            ->requirePresence('payment_company', 'create')
            ->notEmptyString('payment_company');

        $validator
            ->scalar('payment_address_1')
            ->maxLength('payment_address_1', 128)
            ->requirePresence('payment_address_1', 'create')
            ->notEmptyString('payment_address_1');

        $validator
            ->scalar('payment_address_2')
            ->maxLength('payment_address_2', 128)
            ->requirePresence('payment_address_2', 'create')
            ->notEmptyString('payment_address_2');

        $validator
            ->scalar('payment_city')
            ->maxLength('payment_city', 128)
            ->requirePresence('payment_city', 'create')
            ->notEmptyString('payment_city');

        $validator
            ->scalar('payment_postcode')
            ->maxLength('payment_postcode', 10)
            ->requirePresence('payment_postcode', 'create')
            ->notEmptyString('payment_postcode');

        $validator
            ->scalar('payment_country')
            ->maxLength('payment_country', 128)
            ->requirePresence('payment_country', 'create')
            ->notEmptyString('payment_country');

        $validator
            ->scalar('payment_zone')
            ->maxLength('payment_zone', 128)
            ->requirePresence('payment_zone', 'create')
            ->notEmptyString('payment_zone');

        $validator
            ->scalar('payment_address_format')
            ->requirePresence('payment_address_format', 'create')
            ->notEmptyString('payment_address_format');

        $validator
            ->scalar('payment_custom_field')
            ->requirePresence('payment_custom_field', 'create')
            ->notEmptyString('payment_custom_field');

        $validator
            ->scalar('payment_method')
            ->maxLength('payment_method', 128)
            ->requirePresence('payment_method', 'create')
            ->notEmptyString('payment_method');

        $validator
            ->scalar('payment_code')
            ->maxLength('payment_code', 128)
            ->requirePresence('payment_code', 'create')
            ->notEmptyString('payment_code');

        $validator
            ->scalar('shipping_firstname')
            ->maxLength('shipping_firstname', 32)
            ->requirePresence('shipping_firstname', 'create')
            ->notEmptyString('shipping_firstname');

        $validator
            ->scalar('shipping_lastname')
            ->maxLength('shipping_lastname', 32)
            ->requirePresence('shipping_lastname', 'create')
            ->notEmptyString('shipping_lastname');

        $validator
            ->scalar('shipping_company')
            ->maxLength('shipping_company', 40)
            ->requirePresence('shipping_company', 'create')
            ->notEmptyString('shipping_company');

        $validator
            ->scalar('shipping_address_1')
            ->maxLength('shipping_address_1', 128)
            ->requirePresence('shipping_address_1', 'create')
            ->notEmptyString('shipping_address_1');

        $validator
            ->scalar('shipping_address_2')
            ->maxLength('shipping_address_2', 128)
            ->requirePresence('shipping_address_2', 'create')
            ->notEmptyString('shipping_address_2');

        $validator
            ->scalar('shipping_city')
            ->maxLength('shipping_city', 128)
            ->requirePresence('shipping_city', 'create')
            ->notEmptyString('shipping_city');

        $validator
            ->scalar('shipping_postcode')
            ->maxLength('shipping_postcode', 10)
            ->requirePresence('shipping_postcode', 'create')
            ->notEmptyString('shipping_postcode');

        $validator
            ->scalar('shipping_country')
            ->maxLength('shipping_country', 128)
            ->requirePresence('shipping_country', 'create')
            ->notEmptyString('shipping_country');

        $validator
            ->scalar('shipping_zone')
            ->maxLength('shipping_zone', 128)
            ->requirePresence('shipping_zone', 'create')
            ->notEmptyString('shipping_zone');

        $validator
            ->scalar('shipping_address_format')
            ->requirePresence('shipping_address_format', 'create')
            ->notEmptyString('shipping_address_format');

        $validator
            ->scalar('shipping_custom_field')
            ->requirePresence('shipping_custom_field', 'create')
            ->notEmptyString('shipping_custom_field');

        $validator
            ->scalar('shipping_method')
            ->maxLength('shipping_method', 128)
            ->requirePresence('shipping_method', 'create')
            ->notEmptyString('shipping_method');

        $validator
            ->scalar('shipping_code')
            ->maxLength('shipping_code', 128)
            ->requirePresence('shipping_code', 'create')
            ->notEmptyString('shipping_code');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->decimal('total')
            ->notEmptyString('total');

        $validator
            ->decimal('commission')
            ->requirePresence('commission', 'create')
            ->notEmptyString('commission');

        $validator
            ->scalar('tracking')
            ->maxLength('tracking', 64)
            ->requirePresence('tracking', 'create')
            ->notEmptyString('tracking');

        $validator
            ->scalar('currency_code')
            ->maxLength('currency_code', 3)
            ->requirePresence('currency_code', 'create')
            ->notEmptyString('currency_code');

        $validator
            ->decimal('currency_value')
            ->notEmptyString('currency_value');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));
        $rules->add($rules->existsIn(['payment_country_id'], 'PaymentCountries'));
        $rules->add($rules->existsIn(['payment_zone_id'], 'PaymentZones'));
        $rules->add($rules->existsIn(['shipping_country_id'], 'ShippingCountries'));
        $rules->add($rules->existsIn(['shipping_zone_id'], 'ShippingZones'));
        $rules->add($rules->existsIn(['order_status_id'], 'OrderStatuses'));
        $rules->add($rules->existsIn(['affiliate_id'], 'Affiliates'));
        $rules->add($rules->existsIn(['marketing_id'], 'Marketings'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['currency_id'], 'Currencies'));

        return $rules;
    }

}
