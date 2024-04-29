<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart4\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \CakePHPOpencart\Model\Table\Opencart4\ZonesTable&\Cake\ORM\Association\BelongsTo $Zones
 *
 * @method \CakePHPOpencart\Model\Entity\Address get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Address|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Address saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 */
class AddressesTable extends Table
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

        $this->setTable('address');
        $this->setDisplayField('address_id');
        $this->setPrimaryKey('address_id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
        ]);
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
            ->integer('address_id')
            ->allowEmptyString('address_id', null, 'create');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 32)
            ->requirePresence('firstname', 'create')
            ->notEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 32)
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname');

        $validator
            ->scalar('company')
            ->maxLength('company', 60)
            ->requirePresence('company', 'create')
            ->notEmptyString('company');

        $validator
            ->scalar('address_1')
            ->maxLength('address_1', 128)
            ->requirePresence('address_1', 'create')
            ->notEmptyString('address_1');

        $validator
            ->scalar('address_2')
            ->maxLength('address_2', 128)
            ->requirePresence('address_2', 'create')
            ->notEmptyString('address_2');

        $validator
            ->scalar('city')
            ->maxLength('city', 128)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->scalar('postcode')
            ->maxLength('postcode', 10)
            ->requirePresence('postcode', 'create')
            ->notEmptyString('postcode');

        $validator
            ->scalar('custom_field')
            ->requirePresence('custom_field', 'create')
            ->notEmptyString('custom_field');

        $validator
            ->boolean('default')
            ->requirePresence('default', 'create')
            ->notEmptyString('default');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));

        return $rules;
    }

}
