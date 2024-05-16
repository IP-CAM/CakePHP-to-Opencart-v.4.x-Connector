<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Manufacturers Model
 *
 * @method \CakePHPOpencart\Model\Entity\Manufacturer get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Manufacturer newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Manufacturer[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Manufacturer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Manufacturer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Manufacturer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Manufacturer[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Manufacturer findOrCreate($search, callable $callback = null, $options = [])
 */
class ManufacturersTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractManufacturersTable
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

        $this->setTable('manufacturer');
        $this->setDisplayField('name');
        $this->setPrimaryKey('manufacturer_id');
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
            ->integer('manufacturer_id')
            ->allowEmptyString('manufacturer_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
