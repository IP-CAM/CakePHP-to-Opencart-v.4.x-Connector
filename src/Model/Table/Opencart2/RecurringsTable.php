<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Recurrings Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrderTable&\Cake\ORM\Association\BelongsToMany $Order
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \CakePHPOpencart\Model\Entity\Recurring get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Recurring newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Recurring[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Recurring|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Recurring saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Recurring patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Recurring[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Recurring findOrCreate($search, callable $callback = null, $options = [])
 */
class RecurringsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractRecurringsTable
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

        $this->setTable('recurring');
        $this->setDisplayField('recurring_id');
        $this->setPrimaryKey('recurring_id');

        $this->belongsToMany('Order', [
            'foreignKey' => 'recurring_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'order_recurring',
            'className' => 'CakePHPOpencart.Order',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'recurring_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'product_recurring',
            'className' => 'CakePHPOpencart.Product',
        ]);
        $this->hasMany('RecurringDescriptions', [
            'foreignKey' => 'recurring_id',
            'className' => 'CakePHPOpencart.RecurringDescriptions',
        ]);
        $this->hasOne('RecurringDescription', [
            'foreignKey' => 'recurring_id',
            'className' => 'CakePHPOpencart.RecurringDescription',
            'conditions' => [
                // to be populated by CakePHPOpencart\Connector
            ],
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
            ->integer('recurring_id')
            ->allowEmptyString('recurring_id', null, 'create');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('frequency')
            ->requirePresence('frequency', 'create')
            ->notEmptyString('frequency');

        $validator
            ->nonNegativeInteger('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->nonNegativeInteger('cycle')
            ->requirePresence('cycle', 'create')
            ->notEmptyString('cycle');

        $validator
            ->requirePresence('trial_status', 'create')
            ->notEmptyString('trial_status');

        $validator
            ->decimal('trial_price')
            ->requirePresence('trial_price', 'create')
            ->notEmptyString('trial_price');

        $validator
            ->scalar('trial_frequency')
            ->requirePresence('trial_frequency', 'create')
            ->notEmptyString('trial_frequency');

        $validator
            ->nonNegativeInteger('trial_duration')
            ->requirePresence('trial_duration', 'create')
            ->notEmptyString('trial_duration');

        $validator
            ->nonNegativeInteger('trial_cycle')
            ->requirePresence('trial_cycle', 'create')
            ->notEmptyString('trial_cycle');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
