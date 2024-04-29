<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoryToLayouts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart2\LayoutsTable&\Cake\ORM\Association\BelongsTo $Layouts
 *
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToLayout findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryToLayoutsTable extends Table
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

        $this->setTable('category_to_layout');
        $this->setDisplayField('category_id');
        $this->setPrimaryKey(['category_id', 'store_id']);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Categories',
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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['layout_id'], 'Layouts'));

        return $rules;
    }

}
