<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Categories Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CategoriesTable&\Cake\ORM\Association\BelongsTo $ParentCategories
 * @property \CakePHPOpencart\Model\Table\Opencart2\CategoriesTable&\Cake\ORM\Association\HasMany $ChildCategories
 * @property \CakePHPOpencart\Model\Table\Opencart2\FilterTable&\Cake\ORM\Association\BelongsToMany $Filter
 * @property \CakePHPOpencart\Model\Table\Opencart2\CouponTable&\Cake\ORM\Association\BelongsToMany $Coupon
 *
 * @method \CakePHPOpencart\Model\Entity\Category get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Category newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Category[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Category|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Category saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Category patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Category[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Category findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoriesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCategoriesTable
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

        $this->setTable('category');
        $this->setDisplayField('category_id');
        $this->setPrimaryKey('category_id');

        $this->belongsTo('ParentCategories', [
            'className' => 'CakePHPOpencart.Categories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildCategories', [
            'className' => 'CakePHPOpencart.Categories',
            'foreignKey' => 'parent_id',
        ]);
        $this->belongsToMany('Filter', [
            'foreignKey' => 'category_id',
            'targetForeignKey' => 'filter_id',
            'joinTable' => 'category_filter',
            'className' => 'CakePHPOpencart.Filter',
        ]);
        $this->belongsToMany('Coupon', [
            'foreignKey' => 'category_id',
            'targetForeignKey' => 'coupon_id',
            'joinTable' => 'coupon_category',
            'className' => 'CakePHPOpencart.Coupon',
        ]);
        $this->hasMany('CategoryDescriptions', [
            'foreignKey' => 'category_id',
            'className' => 'CakePHPOpencart.CategoryDescriptions',
        ]);
        $this->hasOne('CategoryDescription', [
            'foreignKey' => 'category_id',
            'className' => 'CakePHPOpencart.CategoryDescriptions',
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
            ->integer('category_id')
            ->allowEmptyString('category_id', null, 'create');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->allowEmptyFile('image');

        $validator
            ->boolean('top')
            ->requirePresence('top', 'create')
            ->notEmptyString('top');

        $validator
            ->integer('column')
            ->requirePresence('column', 'create')
            ->notEmptyString('column');

        $validator
            ->integer('sort_order')
            ->notEmptyString('sort_order');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        $validator
            ->dateTime('date_modified')
            ->requirePresence('date_modified', 'create')
            ->notEmptyDateTime('date_modified');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentCategories'));

        return $rules;
    }

}
