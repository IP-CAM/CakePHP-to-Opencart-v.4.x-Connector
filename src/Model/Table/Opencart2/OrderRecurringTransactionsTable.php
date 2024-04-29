<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderRecurringTransactions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrderRecurringsTable&\Cake\ORM\Association\BelongsTo $OrderRecurrings
 *
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurringTransaction findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderRecurringTransactionsTable extends Table
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

        $this->setTable('order_recurring_transaction');
        $this->setDisplayField('order_recurring_transaction_id');
        $this->setPrimaryKey('order_recurring_transaction_id');

        $this->belongsTo('OrderRecurrings', [
            'foreignKey' => 'order_recurring_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.OrderRecurrings',
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
            ->integer('order_recurring_transaction_id')
            ->allowEmptyString('order_recurring_transaction_id', null, 'create');

        $validator
            ->scalar('reference')
            ->maxLength('reference', 255)
            ->requirePresence('reference', 'create')
            ->notEmptyString('reference');

        $validator
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

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
        $rules->add($rules->existsIn(['order_recurring_id'], 'OrderRecurrings'));

        return $rules;
    }

}
