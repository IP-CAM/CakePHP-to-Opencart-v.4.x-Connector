<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductRecurrings Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart2\RecurringsTable&\Cake\ORM\Association\BelongsTo $Recurrings
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 *
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRecurring findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductRecurringsTable extends Table
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

        $this->setTable('product_recurring');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'recurring_id', 'customer_group_id']);

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
        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
        ]);
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
        $rules->add($rules->existsIn(['recurring_id'], 'Recurrings'));
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));

        return $rules;
    }

}
