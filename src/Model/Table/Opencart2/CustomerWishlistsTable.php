<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerWishlists Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 *
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerWishlist findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerWishlistsTable extends Table
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

        $this->setTable('customer_wishlist');
        $this->setDisplayField('customer_id');
        $this->setPrimaryKey(['customer_id', 'product_id']);

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
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
        $rules->add($rules->existsIn(['product_id'], 'Products'));

        return $rules;
    }

}
