<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Affiliates Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CountriesTable&\Cake\ORM\Association\BelongsTo $Countries
 * @property \CakePHPOpencart\Model\Table\Opencart2\ZonesTable&\Cake\ORM\Association\BelongsTo $Zones
 *
 * @method \CakePHPOpencart\Model\Entity\Affiliate get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Affiliate newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Affiliate[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Affiliate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Affiliate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Affiliate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Affiliate[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Affiliate findOrCreate($search, callable $callback = null, $options = [])
 */
class AffiliatesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractAffiliatesTable
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

        $this->setTable('affiliate');
        $this->setDisplayField('affiliate_id');
        $this->setPrimaryKey('affiliate_id');

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
            ->integer('affiliate_id')
            ->allowEmptyString('affiliate_id', null, 'create');

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
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

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
            ->scalar('password')
            ->maxLength('password', 40)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('salt')
            ->maxLength('salt', 9)
            ->requirePresence('salt', 'create')
            ->notEmptyString('salt');

        $validator
            ->scalar('company')
            ->maxLength('company', 40)
            ->requirePresence('company', 'create')
            ->notEmptyString('company');

        $validator
            ->scalar('website')
            ->maxLength('website', 255)
            ->requirePresence('website', 'create')
            ->notEmptyString('website');

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
            ->scalar('code')
            ->maxLength('code', 64)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->decimal('commission')
            ->notEmptyString('commission');

        $validator
            ->scalar('tax')
            ->maxLength('tax', 64)
            ->requirePresence('tax', 'create')
            ->notEmptyString('tax');

        $validator
            ->scalar('payment')
            ->maxLength('payment', 6)
            ->requirePresence('payment', 'create')
            ->notEmptyString('payment');

        $validator
            ->scalar('cheque')
            ->maxLength('cheque', 100)
            ->requirePresence('cheque', 'create')
            ->notEmptyString('cheque');

        $validator
            ->scalar('paypal')
            ->maxLength('paypal', 64)
            ->requirePresence('paypal', 'create')
            ->notEmptyString('paypal');

        $validator
            ->scalar('bank_name')
            ->maxLength('bank_name', 64)
            ->requirePresence('bank_name', 'create')
            ->notEmptyString('bank_name');

        $validator
            ->scalar('bank_branch_number')
            ->maxLength('bank_branch_number', 64)
            ->requirePresence('bank_branch_number', 'create')
            ->notEmptyString('bank_branch_number');

        $validator
            ->scalar('bank_swift_code')
            ->maxLength('bank_swift_code', 64)
            ->requirePresence('bank_swift_code', 'create')
            ->notEmptyString('bank_swift_code');

        $validator
            ->scalar('bank_account_name')
            ->maxLength('bank_account_name', 64)
            ->requirePresence('bank_account_name', 'create')
            ->notEmptyString('bank_account_name');

        $validator
            ->scalar('bank_account_number')
            ->maxLength('bank_account_number', 64)
            ->requirePresence('bank_account_number', 'create')
            ->notEmptyString('bank_account_number');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->boolean('approved')
            ->requirePresence('approved', 'create')
            ->notEmptyString('approved');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        $rules->add($rules->existsIn(['zone_id'], 'Zones'));

        return $rules;
    }

}
