<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerSearches Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 * @property \CakePHPOpencart\Model\Table\Opencart4\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerSearch findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerSearchesTable extends Table
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

        $this->setTable('customer_search');
        $this->setDisplayField('customer_search_id');
        $this->setPrimaryKey('customer_search_id');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Categories',
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
            ->integer('customer_search_id')
            ->allowEmptyString('customer_search_id', null, 'create');

        $validator
            ->scalar('keyword')
            ->maxLength('keyword', 255)
            ->requirePresence('keyword', 'create')
            ->notEmptyString('keyword');

        $validator
            ->boolean('sub_category')
            ->requirePresence('sub_category', 'create')
            ->notEmptyString('sub_category');

        $validator
            ->boolean('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('products')
            ->requirePresence('products', 'create')
            ->notEmptyString('products');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

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
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));

        return $rules;
    }

}
