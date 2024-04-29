<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxClasses Model
 *
 * @method \CakePHPOpencart\Model\Entity\TaxClass get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxClass newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxClass[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxClass|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxClass saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxClass[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxClass findOrCreate($search, callable $callback = null, $options = [])
 */
class TaxClassesTable extends Table
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

        $this->setTable('tax_class');
        $this->setDisplayField('title');
        $this->setPrimaryKey('tax_class_id');
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
            ->integer('tax_class_id')
            ->allowEmptyString('tax_class_id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 32)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
