<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sessions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ApiTable&\Cake\ORM\Association\BelongsToMany $Api
 *
 * @method \CakePHPOpencart\Model\Entity\Session get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Session newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Session[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Session|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Session saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Session patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Session[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Session findOrCreate($search, callable $callback = null, $options = [])
 */
class SessionsTable extends Table
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

        $this->setTable('session');
        $this->setDisplayField('session_id');
        $this->setPrimaryKey('session_id');

        $this->belongsToMany('Api', [
            'foreignKey' => 'session_id',
            'targetForeignKey' => 'api_id',
            'joinTable' => 'api_session',
            'className' => 'CakePHPOpencart.Api',
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
            ->scalar('session_id')
            ->maxLength('session_id', 32)
            ->allowEmptyString('session_id', null, 'create');

        $validator
            ->scalar('data')
            ->requirePresence('data', 'create')
            ->notEmptyString('data');

        $validator
            ->dateTime('expire')
            ->requirePresence('expire', 'create')
            ->notEmptyDateTime('expire');

        return $validator;
    }

}
