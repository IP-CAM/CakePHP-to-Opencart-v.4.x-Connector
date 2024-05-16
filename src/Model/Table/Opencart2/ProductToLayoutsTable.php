<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ProductToLayouts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart2\LayoutsTable&\Cake\ORM\Association\BelongsTo $Layouts
 *
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToLayout findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductToLayoutsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractProductToLayoutsTable
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

        $this->setTable('product_to_layout');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'store_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
        $this->belongsTo('Layouts', [
            'foreignKey' => 'layout_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Layouts',
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
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['layout_id'], 'Layouts'));

        return $rules;
    }

}
