<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductRewards Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 *
 * @method \CakePHPOpencart\Model\Entity\ProductReward get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductReward newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductReward[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductReward|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductReward saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductReward patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductReward[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductReward findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductRewardsTable extends Table
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

        $this->setTable('product_reward');
        $this->setDisplayField('product_reward_id');
        $this->setPrimaryKey('product_reward_id');

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
            ->integer('product_reward_id')
            ->allowEmptyString('product_reward_id', null, 'create');

        $validator
            ->integer('points')
            ->notEmptyString('points');

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
