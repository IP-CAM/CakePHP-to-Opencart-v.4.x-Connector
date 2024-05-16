<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ProductSpecials Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 *
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductSpecial findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductSpecialsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractProductSpecialsTable
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

        $this->setTable('product_special');
        $this->setDisplayField('product_special_id');
        $this->setPrimaryKey('product_special_id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
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
            ->integer('product_special_id')
            ->allowEmptyString('product_special_id', null, 'create');

        $validator
            ->integer('priority')
            ->notEmptyString('priority');

        $validator
            ->decimal('price')
            ->notEmptyString('price');

        $validator
            ->date('date_start')
            ->requirePresence('date_start', 'create')
            ->notEmptyDate('date_start');

        $validator
            ->date('date_end')
            ->requirePresence('date_end', 'create')
            ->notEmptyDate('date_end');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));

        return $rules;
    }

}
