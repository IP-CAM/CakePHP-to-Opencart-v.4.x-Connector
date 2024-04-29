<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubscriptionPlans Model
 *
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlan findOrCreate($search, callable $callback = null, $options = [])
 */
class SubscriptionPlansTable extends Table
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

        $this->setTable('subscription_plan');
        $this->setDisplayField('subscription_plan_id');
        $this->setPrimaryKey('subscription_plan_id');
        $this->hasMany('SubscriptionPlanDescriptions', [
            'foreignKey' => 'subscription_plan_id',
            'className' => 'CakePHPOpencart.SubscriptionPlanDescriptions',
        ]);
        $this->hasOne('SubscriptionPlanDescription', [
            'foreignKey' => 'subscription_plan_id',
            'className' => 'CakePHPOpencart.SubscriptionPlanDescription',
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
            ->integer('subscription_plan_id')
            ->allowEmptyString('subscription_plan_id', null, 'create');

        $validator
            ->scalar('trial_frequency')
            ->requirePresence('trial_frequency', 'create')
            ->notEmptyString('trial_frequency');

        $validator
            ->integer('trial_duration')
            ->requirePresence('trial_duration', 'create')
            ->notEmptyString('trial_duration');

        $validator
            ->integer('trial_cycle')
            ->requirePresence('trial_cycle', 'create')
            ->notEmptyString('trial_cycle');

        $validator
            ->requirePresence('trial_status', 'create')
            ->notEmptyString('trial_status');

        $validator
            ->scalar('frequency')
            ->requirePresence('frequency', 'create')
            ->notEmptyString('frequency');

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->integer('cycle')
            ->requirePresence('cycle', 'create')
            ->notEmptyString('cycle');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
