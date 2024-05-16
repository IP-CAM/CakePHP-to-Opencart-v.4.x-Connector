<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Filters Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\FilterGroupsTable&\Cake\ORM\Association\BelongsTo $FilterGroups
 * @property \CakePHPOpencart\Model\Table\Opencart4\CategoryTable&\Cake\ORM\Association\BelongsToMany $Category
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \CakePHPOpencart\Model\Entity\Filter get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Filter newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Filter[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Filter|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Filter saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Filter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Filter[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Filter findOrCreate($search, callable $callback = null, $options = [])
 */
class FiltersTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractFiltersTable
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

        $this->setTable('filter');
        $this->setDisplayField('filter_id');
        $this->setPrimaryKey('filter_id');

        $this->belongsTo('FilterGroups', [
            'foreignKey' => 'filter_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.FilterGroups',
        ]);
        $this->belongsToMany('Category', [
            'foreignKey' => 'filter_id',
            'targetForeignKey' => 'category_id',
            'joinTable' => 'category_filter',
            'className' => 'CakePHPOpencart.Category',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'filter_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'product_filter',
            'className' => 'CakePHPOpencart.Product',
        ]);
        $this->hasMany('FilterDescriptions', [
            'foreignKey' => 'filter_id',
            'className' => 'CakePHPOpencart.FilterDescriptions',
        ]);
        $this->hasOne('FilterDescription', [
            'foreignKey' => 'filter_id',
            'className' => 'CakePHPOpencart.FilterDescription',
            'conditions' => [
                // to be populated by CakePHPOpencart\Connector
            ],
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
            ->integer('filter_id')
            ->allowEmptyString('filter_id', null, 'create');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

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
        $rules->add($rules->existsIn(['filter_group_id'], 'FilterGroups'));

        return $rules;
    }

}
