<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * GeoZones Model
 *
 * @method \CakePHPOpencart\Model\Entity\GeoZone get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\GeoZone newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\GeoZone[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\GeoZone|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\GeoZone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\GeoZone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\GeoZone[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\GeoZone findOrCreate($search, callable $callback = null, $options = [])
 */
class GeoZonesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractGeoZonesTable
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

        $this->setTable('geo_zone');
        $this->setDisplayField('name');
        $this->setPrimaryKey('geo_zone_id');
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
            ->integer('geo_zone_id')
            ->allowEmptyString('geo_zone_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
