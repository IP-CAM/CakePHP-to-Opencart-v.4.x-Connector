<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ReturnHistories Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ReturnsTable&\Cake\ORM\Association\BelongsTo $Returns
 * @property \CakePHPOpencart\Model\Table\Opencart2\ReturnStatusesTable&\Cake\ORM\Association\BelongsTo $ReturnStatuses
 *
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class ReturnHistoriesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractReturnHistoriesTable
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

        $this->setTable('return_history');
        $this->setDisplayField('return_history_id');
        $this->setPrimaryKey('return_history_id');

        $this->belongsTo('Returns', [
            'foreignKey' => 'return_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Returns',
        ]);
        $this->belongsTo('ReturnStatuses', [
            'foreignKey' => 'return_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ReturnStatuses',
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
            ->integer('return_history_id')
            ->allowEmptyString('return_history_id', null, 'create');

        $validator
            ->boolean('notify')
            ->requirePresence('notify', 'create')
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
        $rules->add($rules->existsIn(['return_id'], 'Returns'));
        $rules->add($rules->existsIn(['return_status_id'], 'ReturnStatuses'));

        return $rules;
    }

}
