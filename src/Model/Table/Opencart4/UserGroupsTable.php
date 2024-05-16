<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * UserGroups Model
 *
 * @method \CakePHPOpencart\Model\Entity\UserGroup get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserGroup newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserGroup[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UserGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class UserGroupsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractUserGroupsTable
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

        $this->setTable('user_group');
        $this->setDisplayField('name');
        $this->setPrimaryKey('user_group_id');
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
            ->integer('user_group_id')
            ->allowEmptyString('user_group_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('permission')
            ->requirePresence('permission', 'create')
            ->notEmptyString('permission');

        return $validator;
    }

}
