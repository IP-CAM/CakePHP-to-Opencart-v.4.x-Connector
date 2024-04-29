<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stores Model
 *
 * @method \CakePHPOpencart\Model\Entity\Store get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Store newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Store[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Store|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Store saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Store patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Store[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Store findOrCreate($search, callable $callback = null, $options = [])
 */
class StoresTable extends Table
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

        $this->setTable('store');
        $this->setDisplayField('name');
        $this->setPrimaryKey('store_id');
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
            ->integer('store_id')
            ->allowEmptyString('store_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('url')
            ->maxLength('url', 255)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        $validator
            ->scalar('ssl')
            ->maxLength('ssl', 255)
            ->requirePresence('ssl', 'create')
            ->notEmptyString('ssl');

        return $validator;
    }

}
