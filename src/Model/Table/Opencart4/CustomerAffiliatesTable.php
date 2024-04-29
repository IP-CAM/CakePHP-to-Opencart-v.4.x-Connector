<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerAffiliates Model
 *
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerAffiliate findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerAffiliatesTable extends Table
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

        $this->setTable('customer_affiliate');
        $this->setDisplayField('customer_id');
        $this->setPrimaryKey('customer_id');
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
            ->integer('customer_id')
            ->allowEmptyString('customer_id', null, 'create');

        $validator
            ->scalar('company')
            ->maxLength('company', 60)
            ->requirePresence('company', 'create')
            ->notEmptyString('company');

        $validator
            ->scalar('website')
            ->maxLength('website', 255)
            ->requirePresence('website', 'create')
            ->notEmptyString('website');

        $validator
            ->scalar('tracking')
            ->maxLength('tracking', 64)
            ->requirePresence('tracking', 'create')
            ->notEmptyString('tracking');

        $validator
            ->decimal('balance')
            ->requirePresence('balance', 'create')
            ->notEmptyString('balance');

        $validator
            ->decimal('commission')
            ->notEmptyString('commission');

        $validator
            ->scalar('tax')
            ->maxLength('tax', 64)
            ->requirePresence('tax', 'create')
            ->notEmptyString('tax');

        $validator
            ->scalar('payment_method')
            ->maxLength('payment_method', 6)
            ->requirePresence('payment_method', 'create')
            ->notEmptyString('payment_method');

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
            ->scalar('custom_field')
            ->requirePresence('custom_field', 'create')
            ->notEmptyString('custom_field');

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
