<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoryPaths Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \CakePHPOpencart\Model\Table\Opencart2\PathsTable&\Cake\ORM\Association\BelongsTo $Paths
 *
 * @method \CakePHPOpencart\Model\Entity\CategoryPath get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryPath newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryPath[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryPath|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryPath saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryPath patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryPath[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryPath findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryPathsTable extends Table
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

        $this->setTable('category_path');
        $this->setDisplayField('category_id');
        $this->setPrimaryKey(['category_id', 'path_id']);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Categories',
        ]);
        $this->belongsTo('Paths', [
            'foreignKey' => 'path_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Paths',
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
            ->integer('level')
            ->requirePresence('level', 'create')
            ->notEmptyString('level');

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
        $rules->add($rules->existsIn(['path_id'], 'Paths'));

        return $rules;
    }

}
