<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Carts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ApisTable&\Cake\ORM\Association\BelongsTo $Apis
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart4\SessionsTable&\Cake\ORM\Association\BelongsTo $Sessions
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\SubscriptionPlansTable&\Cake\ORM\Association\BelongsTo $SubscriptionPlans
 *
 * @method \CakePHPOpencart\Model\Entity\Cart get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cart newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cart[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cart|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cart[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Cart findOrCreate($search, callable $callback = null, $options = [])
 */
class CartsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCartsTable
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

        $this->setTable('cart');
        $this->setDisplayField('cart_id');
        $this->setPrimaryKey('cart_id');

        $this->belongsTo('Apis', [
            'foreignKey' => 'api_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Apis',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
        ]);
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Sessions',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('SubscriptionPlans', [
            'foreignKey' => 'subscription_plan_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.SubscriptionPlans',
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
            ->integer('cart_id')
            ->allowEmptyString('cart_id', null, 'create');

        $validator
            ->scalar('option')
            ->requirePresence('option', 'create')
            ->notEmptyString('option');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->boolean('override')
            ->requirePresence('override', 'create')
            ->notEmptyString('override');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

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
        $rules->add($rules->existsIn(['api_id'], 'Apis'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['subscription_plan_id'], 'SubscriptionPlans'));

        return $rules;
    }

}
