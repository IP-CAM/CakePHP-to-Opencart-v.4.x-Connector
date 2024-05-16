<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * CategoryFilters Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \CakePHPOpencart\Model\Table\Opencart4\FiltersTable&\Cake\ORM\Association\BelongsTo $Filters
 *
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryFilter findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryFiltersTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCategoryFiltersTable
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

        $this->setTable('category_filter');
        $this->setDisplayField('category_id');
        $this->setPrimaryKey(['category_id', 'filter_id']);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Categories',
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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['filter_id'], 'Filters'));

        return $rules;
    }

}
