<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoryDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryDescriptionsTable extends Table
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

        $this->setTable('category_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['category_id', 'language_id']);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Categories',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('meta_title')
            ->maxLength('meta_title', 255)
            ->requirePresence('meta_title', 'create')
            ->notEmptyString('meta_title');

        $validator
            ->scalar('meta_description')
            ->maxLength('meta_description', 255)
            ->requirePresence('meta_description', 'create')
            ->notEmptyString('meta_description');

        $validator
            ->scalar('meta_keyword')
            ->maxLength('meta_keyword', 255)
            ->requirePresence('meta_keyword', 'create')
            ->notEmptyString('meta_keyword');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
