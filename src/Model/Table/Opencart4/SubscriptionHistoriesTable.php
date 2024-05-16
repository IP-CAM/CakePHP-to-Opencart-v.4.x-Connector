<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * SubscriptionHistories Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionsTable&\Cake\ORM\Association\BelongsTo $Subscriptions
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionStatusesTable&\Cake\ORM\Association\BelongsTo $SubscriptionStatuses
 *
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class SubscriptionHistoriesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractSubscriptionHistoriesTable
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

        $this->setTable('subscription_history');
        $this->setDisplayField('subscription_history_id');
        $this->setPrimaryKey('subscription_history_id');

        $this->belongsTo('Subscriptions', [
            'foreignKey' => 'subscription_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Subscriptions',
        ]);
        $this->belongsTo('SubscriptionStatuses', [
            'foreignKey' => 'subscription_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.SubscriptionStatuses',
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
            ->integer('subscription_history_id')
            ->allowEmptyString('subscription_history_id', null, 'create');

        $validator
            ->boolean('notify')
            ->notEmptyString('notify');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

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
        $rules->add($rules->existsIn(['subscription_id'], 'Subscriptions'));
        $rules->add($rules->existsIn(['subscription_status_id'], 'SubscriptionStatuses'));

        return $rules;
    }

}
