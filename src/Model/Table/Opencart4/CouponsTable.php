<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coupons Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CategoryTable&\Cake\ORM\Association\BelongsToMany $Category
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \CakePHPOpencart\Model\Entity\Coupon get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Coupon newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Coupon[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Coupon|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Coupon saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Coupon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Coupon[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Coupon findOrCreate($search, callable $callback = null, $options = [])
 */
class CouponsTable extends Table
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

        $this->setTable('coupon');
        $this->setDisplayField('name');
        $this->setPrimaryKey('coupon_id');

        $this->belongsToMany('Category', [
            'foreignKey' => 'coupon_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'coupon_category',
            'className' => 'CakePHPOpencart.Category',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'coupon_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'coupon_product',
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
            ->integer('coupon_id')
            ->allowEmptyString('coupon_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 20)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('type')
            ->maxLength('type', 1)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->decimal('discount')
            ->requirePresence('discount', 'create')
            ->notEmptyString('discount');

        $validator
            ->boolean('logged')
            ->requirePresence('logged', 'create')
            ->notEmptyString('logged');

        $validator
            ->boolean('shipping')
            ->requirePresence('shipping', 'create')
            ->notEmptyString('shipping');

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->date('date_start')
            ->requirePresence('date_start', 'create')
            ->notEmptyDate('date_start');

        $validator
            ->date('date_end')
            ->requirePresence('date_end', 'create')
            ->notEmptyDate('date_end');

        $validator
            ->integer('uses_total')
            ->requirePresence('uses_total', 'create')
            ->notEmptyString('uses_total');

        $validator
            ->integer('uses_customer')
            ->requirePresence('uses_customer', 'create')
            ->notEmptyString('uses_customer');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        return $validator;
    }

}
