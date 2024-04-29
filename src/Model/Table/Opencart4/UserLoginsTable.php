<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserLogins Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \CakePHPOpencart\Model\Entity\UserLogin get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserLogin newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserLogin[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserLogin|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserLogin saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserLogin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserLogin[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserLogin findOrCreate($search, callable $callback = null, $options = [])
 */
class UserLoginsTable extends Table
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

        $this->setTable('user_login');
        $this->setDisplayField('user_login_id');
        $this->setPrimaryKey('user_login_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Users',
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
            ->integer('user_login_id')
            ->allowEmptyString('user_login_id', null, 'create');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->scalar('user_agent')
            ->maxLength('user_agent', 255)
            ->requirePresence('user_agent', 'create')
            ->notEmptyString('user_agent');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }

}
