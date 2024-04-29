<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \CakePHPOpencart\Model\Table\Opencart2\AddressesTable&\Cake\ORM\Association\BelongsTo $Addresses
 *
 * @method \CakePHPOpencart\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Customer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Customer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Customer findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomersTable extends Table
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

        $this->setTable('customer');
        $this->setDisplayField('customer_id');
        $this->setPrimaryKey('customer_id');

        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
        ]);
        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Addresses',
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
            ->integer('customer_id')
            ->allowEmptyString('customer_id', null, 'create');

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
            ->scalar('cart')
            ->allowEmptyString('cart');

        $validator
            ->scalar('wishlist')
            ->allowEmptyString('wishlist');

        $validator
            ->boolean('newsletter')
            ->notEmptyString('newsletter');

        $validator
            ->scalar('custom_field')
            ->requirePresence('custom_field', 'create')
            ->notEmptyString('custom_field');

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
            ->boolean('safe')
            ->requirePresence('safe', 'create')
            ->notEmptyString('safe');

        $validator
            ->scalar('token')
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->scalar('code')
            ->maxLength('code', 40)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

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
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }

}
