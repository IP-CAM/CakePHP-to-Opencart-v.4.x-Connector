<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\StockStatusesTable&\Cake\ORM\Association\BelongsTo $StockStatuses
 * @property \CakePHPOpencart\Model\Table\Opencart2\ManufacturersTable&\Cake\ORM\Association\BelongsTo $Manufacturers
 * @property \CakePHPOpencart\Model\Table\Opencart2\TaxClassesTable&\Cake\ORM\Association\BelongsTo $TaxClasses
 * @property \CakePHPOpencart\Model\Table\Opencart2\WeightClassesTable&\Cake\ORM\Association\BelongsTo $WeightClasses
 * @property \CakePHPOpencart\Model\Table\Opencart2\LengthClassesTable&\Cake\ORM\Association\BelongsTo $LengthClasses
 * @property \CakePHPOpencart\Model\Table\Opencart2\CouponTable&\Cake\ORM\Association\BelongsToMany $Coupon
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrderTable&\Cake\ORM\Association\BelongsToMany $Order
 * @property \CakePHPOpencart\Model\Table\Opencart2\AttributeTable&\Cake\ORM\Association\BelongsToMany $Attribute
 * @property \CakePHPOpencart\Model\Table\Opencart2\FilterTable&\Cake\ORM\Association\BelongsToMany $Filter
 * @property \CakePHPOpencart\Model\Table\Opencart2\OptionTable&\Cake\ORM\Association\BelongsToMany $Option
 * @property \CakePHPOpencart\Model\Table\Opencart2\OptionValueTable&\Cake\ORM\Association\BelongsToMany $OptionValue
 * @property \CakePHPOpencart\Model\Table\Opencart2\RecurringTable&\Cake\ORM\Association\BelongsToMany $Recurring
 *
 * @method \CakePHPOpencart\Model\Entity\Product get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('product');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey('product_id');

        $this->belongsTo('StockStatuses', [
            'foreignKey' => 'stock_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.StockStatuses',
        ]);
        $this->belongsTo('Manufacturers', [
            'foreignKey' => 'manufacturer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Manufacturers',
        ]);
        $this->belongsTo('TaxClasses', [
            'foreignKey' => 'tax_class_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.TaxClasses',
        ]);
        $this->belongsTo('WeightClasses', [
            'foreignKey' => 'weight_class_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.WeightClasses',
        ]);
        $this->belongsTo('LengthClasses', [
            'foreignKey' => 'length_class_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.LengthClasses',
        ]);
        $this->belongsToMany('Coupon', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'coupon_id',
            'joinTable' => 'coupon_product',
            'className' => 'CakePHPOpencart.Coupon',
        ]);
        $this->belongsToMany('Order', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'order_product',
            'className' => 'CakePHPOpencart.Order',
        ]);
        $this->belongsToMany('Attribute', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'attribute_id',
            'joinTable' => 'product_attribute',
            'className' => 'CakePHPOpencart.Attribute',
        ]);
        $this->belongsToMany('Filter', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'filter_id',
            'joinTable' => 'product_filter',
            'className' => 'CakePHPOpencart.Filter',
        ]);
        $this->belongsToMany('Option', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'option_id',
            'joinTable' => 'product_option',
            'className' => 'CakePHPOpencart.Option',
        ]);
        $this->belongsToMany('OptionValue', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'option_value_id',
            'joinTable' => 'product_option_value',
            'className' => 'CakePHPOpencart.OptionValue',
        ]);
        $this->belongsToMany('Recurring', [
            'foreignKey' => 'product_id',
            'targetForeignKey' => 'recurring_id',
            'joinTable' => 'product_recurring',
            'className' => 'CakePHPOpencart.Recurring',
        ]);
        $this->hasMany('ProductDescriptions', [
            'foreignKey' => 'product_id',
            'className' => 'CakePHPOpencart.ProductDescriptions',
        ]);
        $this->hasOne('ProductDescription', [
            'foreignKey' => 'product_id',
            'className' => 'CakePHPOpencart.ProductDescription',
            'conditions' => [
                // to be populated by CakePHPOpencart\Connector
            ],
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
            ->integer('product_id')
            ->allowEmptyString('product_id', null, 'create');

        $validator
            ->scalar('model')
            ->maxLength('model', 64)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->scalar('sku')
            ->maxLength('sku', 64)
            ->requirePresence('sku', 'create')
            ->notEmptyString('sku');

        $validator
            ->scalar('upc')
            ->maxLength('upc', 12)
            ->requirePresence('upc', 'create')
            ->notEmptyString('upc');

        $validator
            ->scalar('ean')
            ->maxLength('ean', 14)
            ->requirePresence('ean', 'create')
            ->notEmptyString('ean');

        $validator
            ->scalar('jan')
            ->maxLength('jan', 13)
            ->requirePresence('jan', 'create')
            ->notEmptyString('jan');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 17)
            ->requirePresence('isbn', 'create')
            ->notEmptyString('isbn');

        $validator
            ->scalar('mpn')
            ->maxLength('mpn', 64)
            ->requirePresence('mpn', 'create')
            ->notEmptyString('mpn');

        $validator
            ->scalar('location')
            ->maxLength('location', 128)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->integer('quantity')
            ->notEmptyString('quantity');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->boolean('shipping')
            ->notEmptyString('shipping');

        $validator
            ->decimal('price')
            ->notEmptyString('price');

        $validator
            ->integer('points')
            ->notEmptyString('points');

        $validator
            ->date('date_available')
            ->notEmptyDate('date_available');

        $validator
            ->decimal('weight')
            ->notEmptyString('weight');

        $validator
            ->decimal('length')
            ->notEmptyString('length');

        $validator
            ->decimal('width')
            ->notEmptyString('width');

        $validator
            ->decimal('height')
            ->notEmptyString('height');

        $validator
            ->boolean('subtract')
            ->notEmptyString('subtract');

        $validator
            ->integer('minimum')
            ->notEmptyString('minimum');

        $validator
            ->integer('sort_order')
            ->notEmptyString('sort_order');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        $validator
            ->integer('viewed')
            ->notEmptyString('viewed');

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
        $rules->add($rules->existsIn(['stock_status_id'], 'StockStatuses'));
        $rules->add($rules->existsIn(['manufacturer_id'], 'Manufacturers'));
        $rules->add($rules->existsIn(['tax_class_id'], 'TaxClasses'));
        $rules->add($rules->existsIn(['weight_class_id'], 'WeightClasses'));
        $rules->add($rules->existsIn(['length_class_id'], 'LengthClasses'));

        return $rules;
    }

}
