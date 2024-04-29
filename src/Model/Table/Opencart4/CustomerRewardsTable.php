<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerRewards Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \CakePHPOpencart\Model\Entity\CustomerReward get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerReward newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerReward[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerReward|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerReward saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerReward patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerReward[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerReward findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerRewardsTable extends Table
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

        $this->setTable('customer_reward');
        $this->setDisplayField('customer_reward_id');
        $this->setPrimaryKey('customer_reward_id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Orders',
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
            ->integer('customer_reward_id')
            ->allowEmptyString('customer_reward_id', null, 'create');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('points')
            ->notEmptyString('points');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }

}
