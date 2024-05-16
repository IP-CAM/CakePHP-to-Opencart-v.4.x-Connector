<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Crons Model
 *
 * @method \CakePHPOpencart\Model\Entity\Cron get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cron newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cron[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cron|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cron saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cron patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cron[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cron findOrCreate($search, callable $callback = null, $options = [])
 */
class CronsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCronsTable
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

        $this->setTable('cron');
        $this->setDisplayField('cron_id');
        $this->setPrimaryKey('cron_id');
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
            ->integer('cron_id')
            ->allowEmptyString('cron_id', null, 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 128)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('cycle')
            ->maxLength('cycle', 12)
            ->requirePresence('cycle', 'create')
            ->notEmptyString('cycle');

        $validator
            ->scalar('action')
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

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

}
