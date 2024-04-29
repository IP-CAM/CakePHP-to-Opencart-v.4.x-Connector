<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AffiliateTransactions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\AffiliatesTable&\Cake\ORM\Association\BelongsTo $Affiliates
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateTransaction findOrCreate($search, callable $callback = null, $options = [])
 */
class AffiliateTransactionsTable extends Table
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

        $this->setTable('affiliate_transaction');
        $this->setDisplayField('affiliate_transaction_id');
        $this->setPrimaryKey('affiliate_transaction_id');

        $this->belongsTo('Affiliates', [
            'foreignKey' => 'affiliate_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Affiliates',
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
            ->integer('affiliate_transaction_id')
            ->allowEmptyString('affiliate_transaction_id', null, 'create');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

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
        $rules->add($rules->existsIn(['affiliate_id'], 'Affiliates'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }

}
