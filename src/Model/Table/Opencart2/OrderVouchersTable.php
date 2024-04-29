<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderVouchers Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart2\VouchersTable&\Cake\ORM\Association\BelongsTo $Vouchers
 * @property \CakePHPOpencart\Model\Table\Opencart2\VoucherThemesTable&\Cake\ORM\Association\BelongsTo $VoucherThemes
 *
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderVoucher findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderVouchersTable extends Table
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

        $this->setTable('order_voucher');
        $this->setDisplayField('order_voucher_id');
        $this->setPrimaryKey('order_voucher_id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Orders',
        ]);
        $this->belongsTo('Vouchers', [
            'foreignKey' => 'voucher_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Vouchers',
        ]);
        $this->belongsTo('VoucherThemes', [
            'foreignKey' => 'voucher_theme_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.VoucherThemes',
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
            ->integer('order_voucher_id')
            ->allowEmptyString('order_voucher_id', null, 'create');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('code')
            ->maxLength('code', 10)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('from_name')
            ->maxLength('from_name', 64)
            ->requirePresence('from_name', 'create')
            ->notEmptyString('from_name');

        $validator
            ->scalar('from_email')
            ->maxLength('from_email', 96)
            ->requirePresence('from_email', 'create')
            ->notEmptyString('from_email');

        $validator
            ->scalar('to_name')
            ->maxLength('to_name', 64)
            ->requirePresence('to_name', 'create')
            ->notEmptyString('to_name');

        $validator
            ->scalar('to_email')
            ->maxLength('to_email', 96)
            ->requirePresence('to_email', 'create')
            ->notEmptyString('to_email');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['voucher_id'], 'Vouchers'));
        $rules->add($rules->existsIn(['voucher_theme_id'], 'VoucherThemes'));

        return $rules;
    }

}
