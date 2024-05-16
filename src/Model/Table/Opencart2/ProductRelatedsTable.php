<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ProductRelateds Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart2\RelatedsTable&\Cake\ORM\Association\BelongsTo $Relateds
 *
 * @method \CakePHPOpencart\Model\Entity\ProductRelated get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRelated newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRelated[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRelated|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRelated saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRelated patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRelated[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductRelated findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductRelatedsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractProductRelatedsTable
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

        $this->setTable('product_related');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'related_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Relateds', [
            'foreignKey' => 'related_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Relateds',
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
        $rules->add($rules->existsIn(['related_id'], 'Relateds'));

        return $rules;
    }

}
