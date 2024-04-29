<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VoucherHistories Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\VouchersTable&\Cake\ORM\Association\BelongsTo $Vouchers
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class VoucherHistoriesTable extends Table
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

        $this->setTable('voucher_history');
        $this->setDisplayField('voucher_history_id');
        $this->setPrimaryKey('voucher_history_id');

        $this->belongsTo('Vouchers', [
            'foreignKey' => 'voucher_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Vouchers',
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
            ->integer('voucher_history_id')
            ->allowEmptyString('voucher_history_id', null, 'create');

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
        $rules->add($rules->existsIn(['voucher_id'], 'Vouchers'));
        $rules->add($rules->existsIn(['order_id'], 'Orders'));

        return $rules;
    }

}
