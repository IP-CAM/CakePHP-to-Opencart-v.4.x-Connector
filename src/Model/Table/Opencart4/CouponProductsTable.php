<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CouponProducts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CouponsTable&\Cake\ORM\Association\BelongsTo $Coupons
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \CakePHPOpencart\Model\Entity\CouponProduct get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponProduct newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponProduct[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponProduct[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponProduct findOrCreate($search, callable $callback = null, $options = [])
 */
class CouponProductsTable extends Table
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

        $this->setTable('coupon_product');
        $this->setDisplayField('coupon_product_id');
        $this->setPrimaryKey('coupon_product_id');

        $this->belongsTo('Coupons', [
            'foreignKey' => 'coupon_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Coupons',
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
            ->integer('coupon_product_id')
            ->allowEmptyString('coupon_product_id', null, 'create');

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
        $rules->add($rules->existsIn(['coupon_id'], 'Coupons'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }

}
