<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoryToStores Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CategoryToStore findOrCreate($search, callable $callback = null, $options = [])
 */
class CategoryToStoresTable extends Table
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

        $this->setTable('category_to_store');
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

        return $rules;
    }

}
