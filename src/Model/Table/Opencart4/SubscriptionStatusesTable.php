<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * SubscriptionStatuses Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionStatusesTable&\Cake\ORM\Association\BelongsTo $SubscriptionStatuses
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SubscriptionStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class SubscriptionStatusesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractSubscriptionStatusesTable
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

        $this->setTable('subscription_status');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['subscription_status_id', 'language_id']);

        $this->belongsTo('SubscriptionStatuses', [
            'foreignKey' => 'subscription_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.SubscriptionStatuses',
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
            ->maxLength('name', 32)
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
        $rules->add($rules->existsIn(['subscription_status_id'], 'SubscriptionStatuses'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
