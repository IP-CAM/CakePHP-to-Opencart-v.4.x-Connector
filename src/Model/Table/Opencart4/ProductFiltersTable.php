<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ProductFilters Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\FiltersTable&\Cake\ORM\Association\BelongsTo $Filters
 *
 * @method \CakePHPOpencart\Model\Entity\ProductFilter get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductFilter newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductFilter[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductFilter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductFilter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductFilter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductFilter[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductFilter findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductFiltersTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractProductFiltersTable
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

        $this->setTable('product_filter');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'filter_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Filters', [
            'foreignKey' => 'filter_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Filters',
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
        $rules->add($rules->existsIn(['filter_id'], 'Filters'));

        return $rules;
    }

}
