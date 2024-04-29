<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Apis Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\SessionTable&\Cake\ORM\Association\BelongsToMany $Session
 *
 * @method \CakePHPOpencart\Model\Entity\Api get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Api newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Api[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Api|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Api saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Api patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Api[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Api findOrCreate($search, callable $callback = null, $options = [])
 */
class ApisTable extends Table
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

        $this->setTable('api');
        $this->setDisplayField('api_id');
        $this->setPrimaryKey('api_id');

        $this->belongsToMany('Session', [
            'foreignKey' => 'api_id',
            'targetForeignKey' => 'session_id',
            'joinTable' => 'api_session',
            'className' => 'CakePHPOpencart.Session',
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
            ->integer('api_id')
            ->allowEmptyString('api_id', null, 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 64)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('key')
            ->requirePresence('key', 'create')
            ->notEmptyString('key');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }

}
