<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Locations Model
 *
 * @method \CakePHPOpencart\Model\Entity\Location get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Location|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Location saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Location findOrCreate($search, callable $callback = null, $options = [])
 */
class LocationsTable extends Table
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

        $this->setTable('location');
        $this->setDisplayField('name');
        $this->setPrimaryKey('location_id');
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
            ->integer('location_id')
            ->allowEmptyString('location_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address')
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 32)
            ->requirePresence('telephone', 'create')
            ->notEmptyString('telephone');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 32)
            ->requirePresence('fax', 'create')
            ->notEmptyString('fax');

        $validator
            ->scalar('geocode')
            ->maxLength('geocode', 32)
            ->requirePresence('geocode', 'create')
            ->notEmptyString('geocode');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->scalar('open')
            ->requirePresence('open', 'create')
            ->notEmptyString('open');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        return $validator;
    }

}
