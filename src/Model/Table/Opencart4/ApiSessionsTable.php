<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApiSessions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ApisTable&\Cake\ORM\Association\BelongsTo $Apis
 * @property \CakePHPOpencart\Model\Table\Opencart4\SessionsTable&\Cake\ORM\Association\BelongsTo $Sessions
 *
 * @method \CakePHPOpencart\Model\Entity\ApiSession get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiSession newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiSession[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiSession|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiSession saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiSession patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiSession[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiSession findOrCreate($search, callable $callback = null, $options = [])
 */
class ApiSessionsTable extends Table
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

        $this->setTable('api_session');
        $this->setDisplayField('api_session_id');
        $this->setPrimaryKey('api_session_id');

        $this->belongsTo('Apis', [
            'foreignKey' => 'api_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Apis',
        ]);
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Sessions',
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
            ->integer('api_session_id')
            ->allowEmptyString('api_session_id', null, 'create');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

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
        $rules->add($rules->existsIn(['api_id'], 'Apis'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }

}
