<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Vouchers Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart4\VoucherThemesTable&\Cake\ORM\Association\BelongsTo $VoucherThemes
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrderTable&\Cake\ORM\Association\BelongsToMany $Order
 * @property \CakePHPOpencart\Model\Table\Opencart4\ThemeTable&\Cake\ORM\Association\BelongsToMany $Theme
 *
 * @method \CakePHPOpencart\Model\Entity\Voucher get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Voucher newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Voucher[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Voucher|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Voucher saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Voucher patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Voucher[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Voucher findOrCreate($search, callable $callback = null, $options = [])
 */
class VouchersTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractVouchersTable
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

        $this->setTable('voucher');
        $this->setDisplayField('voucher_id');
        $this->setPrimaryKey('voucher_id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Orders',
        ]);
        $this->belongsTo('VoucherThemes', [
            'foreignKey' => 'voucher_theme_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.VoucherThemes',
        ]);
        $this->belongsToMany('Order', [
            'foreignKey' => 'voucher_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'order_voucher',
            'className' => 'CakePHPOpencart.Order',
        ]);
        $this->belongsToMany('Theme', [
            'foreignKey' => 'voucher_id',
            'targetForeignKey' => 'theme_id',
            'joinTable' => 'voucher_theme',
            'className' => 'CakePHPOpencart.Theme',
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
            ->integer('voucher_id')
            ->allowEmptyString('voucher_id', null, 'create');

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
        $rules->add($rules->existsIn(['voucher_theme_id'], 'VoucherThemes'));

        return $rules;
    }

}
