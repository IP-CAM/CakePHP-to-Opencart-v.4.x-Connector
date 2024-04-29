<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CouponCategories Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CouponsTable&\Cake\ORM\Association\BelongsTo $Coupons
 * @property \CakePHPOpencart\Model\Table\Opencart2\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \CakePHPOpencart\Model\Entity\CouponCategory get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponCategory newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponCategory[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponCategory[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CouponCategory findOrCreate($search, callable $callback = null, $options = [])
 */
class CouponCategoriesTable extends Table
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

        $this->setTable('coupon_category');
        $this->setDisplayField('coupon_id');
        $this->setPrimaryKey(['coupon_id', 'category_id']);

        $this->belongsTo('Coupons', [
            'foreignKey' => 'coupon_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Coupons',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Categories',
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
        $rules->add($rules->existsIn(['coupon_id'], 'Coupons'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }

}
