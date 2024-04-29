<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notifications Model
 *
 * @method \CakePHPOpencart\Model\Entity\Notification get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Notification newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Notification[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Notification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Notification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Notification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Notification[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Notification findOrCreate($search, callable $callback = null, $options = [])
 */
class NotificationsTable extends Table
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

        $this->setTable('notification');
        $this->setDisplayField('title');
        $this->setPrimaryKey('notification_id');
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
            ->integer('notification_id')
            ->allowEmptyString('notification_id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 64)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmptyString('text');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        return $validator;
    }

}
