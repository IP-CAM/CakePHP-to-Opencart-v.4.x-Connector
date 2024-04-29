<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductSubscriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionPlansTable&\Cake\ORM\Association\BelongsTo $SubscriptionPlans
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 *
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSubscription findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductSubscriptionsTable extends Table
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

        $this->setTable('product_subscription');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'subscription_plan_id', 'customer_group_id']);

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
        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
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
            ->decimal('trial_price')
            ->requirePresence('trial_price', 'create')
            ->notEmptyString('trial_price');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['subscription_plan_id'], 'SubscriptionPlans'));
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));

        return $rules;
    }

}
