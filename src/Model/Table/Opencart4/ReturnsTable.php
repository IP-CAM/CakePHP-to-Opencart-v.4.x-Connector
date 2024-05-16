<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Returns Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart4\ReturnReasonsTable&\Cake\ORM\Association\BelongsTo $ReturnReasons
 * @property \CakePHPOpencart\Model\Table\Opencart4\ReturnActionsTable&\Cake\ORM\Association\BelongsTo $ReturnActions
 * @property \CakePHPOpencart\Model\Table\Opencart4\ReturnStatusesTable&\Cake\ORM\Association\BelongsTo $ReturnStatuses
 *
 * @method \CakePHPOpencart\Model\Entity\Return get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Return newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Return[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Return|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Return saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Return patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Return[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Return findOrCreate($search, callable $callback = null, $options = [])
 */
class ReturnsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractReturnsTable
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

        $this->setTable('return');
        $this->setDisplayField('return_id');
        $this->setPrimaryKey('return_id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Orders',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
        ]);
        $this->belongsTo('ReturnReasons', [
            'foreignKey' => 'return_reason_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ReturnReasons',
        ]);
        $this->belongsTo('ReturnActions', [
            'foreignKey' => 'return_action_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ReturnActions',
        ]);
        $this->belongsTo('ReturnStatuses', [
            'foreignKey' => 'return_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ReturnStatuses',
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
            ->integer('return_id')
            ->allowEmptyString('return_id', null, 'create');

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
            ->scalar('product')
            ->maxLength('product', 255)
            ->requirePresence('product', 'create')
            ->notEmptyString('product');

        $validator
            ->scalar('model')
            ->maxLength('model', 64)
            ->requirePresence('model', 'create')
            ->notEmptyString('model');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->boolean('opened')
            ->requirePresence('opened', 'create')
            ->notEmptyString('opened');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->date('date_ordered')
            ->requirePresence('date_ordered', 'create')
            ->notEmptyDate('date_ordered');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        $validator
            ->dateTime('date_modified')
            ->requirePresence('date_modified', 'create')
            ->notEmptyDateTime('date_modified');

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['return_reason_id'], 'ReturnReasons'));
        $rules->add($rules->existsIn(['return_action_id'], 'ReturnActions'));
        $rules->add($rules->existsIn(['return_status_id'], 'ReturnStatuses'));

        return $rules;
    }

}
