<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxRates Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\GeoZonesTable&\Cake\ORM\Association\BelongsTo $GeoZones
 *
 * @method \CakePHPOpencart\Model\Entity\TaxRate get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRate newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRate[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRate[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRate findOrCreate($search, callable $callback = null, $options = [])
 */
class TaxRatesTable extends Table
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

        $this->setTable('tax_rate');
        $this->setDisplayField('name');
        $this->setPrimaryKey('tax_rate_id');

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
            ->integer('tax_rate_id')
            ->allowEmptyString('tax_rate_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->decimal('rate')
            ->notEmptyString('rate');

        $validator
            ->scalar('type')
            ->maxLength('type', 1)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

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
        $rules->add($rules->existsIn(['geo_zone_id'], 'GeoZones'));

        return $rules;
    }

}
