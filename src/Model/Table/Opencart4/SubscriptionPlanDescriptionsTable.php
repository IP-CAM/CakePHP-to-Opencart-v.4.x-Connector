<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SubscriptionPlanDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionPlansTable&\Cake\ORM\Association\BelongsTo $SubscriptionPlans
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionPlanDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class SubscriptionPlanDescriptionsTable extends Table
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

        $this->setTable('subscription_plan_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['subscription_plan_id', 'language_id']);

        $this->belongsTo('SubscriptionPlans', [
            'foreignKey' => 'subscription_plan_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.SubscriptionPlans',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['subscription_plan_id'], 'SubscriptionPlans'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
