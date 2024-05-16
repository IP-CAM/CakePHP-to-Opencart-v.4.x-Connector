<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ProductOptionValues Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductOptionsTable&\Cake\ORM\Association\BelongsTo $ProductOptions
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart2\OptionsTable&\Cake\ORM\Association\BelongsTo $Options
 * @property \CakePHPOpencart\Model\Table\Opencart2\OptionValuesTable&\Cake\ORM\Association\BelongsTo $OptionValues
 *
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductOptionValue findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductOptionValuesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractProductOptionValuesTable
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

        $this->setTable('product_option_value');
        $this->setDisplayField('product_option_value_id');
        $this->setPrimaryKey('product_option_value_id');

        $this->belongsTo('ProductOptions', [
            'foreignKey' => 'product_option_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ProductOptions',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Options', [
            'foreignKey' => 'option_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Options',
        ]);
        $this->belongsTo('OptionValues', [
            'foreignKey' => 'option_value_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.OptionValues',
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
            ->integer('product_option_value_id')
            ->allowEmptyString('product_option_value_id', null, 'create');

        $validator
            ->integer('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->boolean('subtract')
            ->requirePresence('subtract', 'create')
            ->notEmptyString('subtract');

        $validator
            ->decimal('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->scalar('price_prefix')
            ->maxLength('price_prefix', 1)
            ->requirePresence('price_prefix', 'create')
            ->notEmptyString('price_prefix');

        $validator
            ->integer('points')
            ->requirePresence('points', 'create')
            ->notEmptyString('points');

        $validator
            ->scalar('points_prefix')
            ->maxLength('points_prefix', 1)
            ->requirePresence('points_prefix', 'create')
            ->notEmptyString('points_prefix');

        $validator
            ->decimal('weight')
            ->requirePresence('weight', 'create')
            ->notEmptyString('weight');

        $validator
            ->scalar('weight_prefix')
            ->maxLength('weight_prefix', 1)
            ->requirePresence('weight_prefix', 'create')
            ->notEmptyString('weight_prefix');

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
        $rules->add($rules->existsIn(['product_option_id'], 'ProductOptions'));
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['option_id'], 'Options'));
        $rules->add($rules->existsIn(['option_value_id'], 'OptionValues'));

        return $rules;
    }

}
