<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ZoneToGeoZones Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \CakePHPOpencart\Model\Table\Opencart2\ZonesTable&\Cake\ORM\Association\BelongsTo $Zones
 * @property \CakePHPOpencart\Model\Table\Opencart2\GeoZonesTable&\Cake\ORM\Association\BelongsTo $GeoZones
 *
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ZoneToGeoZone findOrCreate($search, callable $callback = null, $options = [])
 */
class ZoneToGeoZonesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractZoneToGeoZonesTable
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

        $this->setTable('zone_to_geo_zone');
        $this->setDisplayField('zone_to_geo_zone_id');
        $this->setPrimaryKey('zone_to_geo_zone_id');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Countries',
        ]);
        $this->belongsTo('Zones', [
            'foreignKey' => 'zone_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Zones',
        ]);
        $this->belongsTo('GeoZones', [
            'foreignKey' => 'geo_zone_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.GeoZones',
        ]);
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
            ->integer('zone_to_geo_zone_id')
            ->allowEmptyString('zone_to_geo_zone_id', null, 'create');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));
        $rules->add($rules->existsIn(['geo_zone_id'], 'GeoZones'));

        return $rules;
    }

}
