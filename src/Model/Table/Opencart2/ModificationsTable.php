<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modifications Model
 *
 * @method \CakePHPOpencart\Model\Entity\Modification get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Modification newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Modification[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Modification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Modification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Modification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Modification[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Modification findOrCreate($search, callable $callback = null, $options = [])
 */
class ModificationsTable extends Table
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

        $this->setTable('modification');
        $this->setDisplayField('name');
        $this->setPrimaryKey('modification_id');
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
            ->integer('modification_id')
            ->allowEmptyString('modification_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 64)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('author')
            ->maxLength('author', 64)
            ->requirePresence('author', 'create')
            ->notEmptyString('author');

        $validator
            ->scalar('version')
            ->maxLength('version', 32)
            ->requirePresence('version', 'create')
            ->notEmptyString('version');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->scalar('xml')
            ->maxLength('xml', 16777215)
            ->requirePresence('xml', 'create')
            ->notEmptyString('xml');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        return $validator;
    }

}
