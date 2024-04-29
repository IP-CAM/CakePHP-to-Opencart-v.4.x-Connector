<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Startups Model
 *
 * @method \CakePHPOpencart\Model\Entity\Startup get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Startup newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Startup[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Startup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Startup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Startup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Startup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Startup findOrCreate($search, callable $callback = null, $options = [])
 */
class StartupsTable extends Table
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

        $this->setTable('startup');
        $this->setDisplayField('startup_id');
        $this->setPrimaryKey('startup_id');
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
            ->integer('startup_id')
            ->allowEmptyString('startup_id', null, 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 64)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('action')
            ->requirePresence('action', 'create')
            ->notEmptyString('action');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
