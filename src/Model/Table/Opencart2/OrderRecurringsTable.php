<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * OrderRecurrings Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart2\RecurringsTable&\Cake\ORM\Association\BelongsTo $Recurrings
 *
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderRecurring findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderRecurringsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractOrderRecurringsTable
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

        $this->setTable('order_recurring');
        $this->setDisplayField('order_recurring_id');
        $this->setPrimaryKey('order_recurring_id');

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
        $this->belongsTo('Recurrings', [
            'foreignKey' => 'recurring_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Recurrings',
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
            ->integer('order_recurring_id')
            ->allowEmptyString('order_recurring_id', null, 'create');

        $validator
            ->scalar('reference')
            ->maxLength('reference', 255)
            ->requirePresence('reference', 'create')
            ->notEmptyString('reference');

        $validator
            ->scalar('product_name')
            ->maxLength('product_name', 255)
            ->requirePresence('product_name', 'create')
            ->notEmptyString('product_name');

        $validator
            ->integer('product_quantity')
            ->requirePresence('product_quantity', 'create')
            ->notEmptyString('product_quantity');

        $validator
            ->scalar('recurring_name')
            ->maxLength('recurring_name', 255)
            ->requirePresence('recurring_name', 'create')
            ->notEmptyString('recurring_name');

        $validator
            ->scalar('recurring_description')
            ->maxLength('recurring_description', 255)
            ->requirePresence('recurring_description', 'create')
            ->notEmptyString('recurring_description');

        $validator
            ->scalar('recurring_frequency')
            ->maxLength('recurring_frequency', 25)
            ->requirePresence('recurring_frequency', 'create')
            ->notEmptyString('recurring_frequency');

        $validator
            ->requirePresence('recurring_cycle', 'create')
            ->notEmptyString('recurring_cycle');

        $validator
            ->requirePresence('recurring_duration', 'create')
            ->notEmptyString('recurring_duration');

        $validator
            ->decimal('recurring_price')
            ->requirePresence('recurring_price', 'create')
            ->notEmptyString('recurring_price');

        $validator
            ->boolean('trial')
            ->requirePresence('trial', 'create')
            ->notEmptyString('trial');

        $validator
            ->scalar('trial_frequency')
            ->maxLength('trial_frequency', 25)
            ->requirePresence('trial_frequency', 'create')
            ->notEmptyString('trial_frequency');

        $validator
            ->requirePresence('trial_cycle', 'create')
            ->notEmptyString('trial_cycle');

        $validator
            ->requirePresence('trial_duration', 'create')
            ->notEmptyString('trial_duration');

        $validator
            ->decimal('trial_price')
            ->requirePresence('trial_price', 'create')
            ->notEmptyString('trial_price');

        $validator
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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['recurring_id'], 'Recurrings'));

        return $rules;
    }

}
