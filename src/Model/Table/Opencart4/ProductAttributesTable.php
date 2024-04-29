<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductAttributes Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart4\AttributesTable&\Cake\ORM\Association\BelongsTo $Attributes
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductAttribute findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductAttributesTable extends Table
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

        $this->setTable('product_attribute');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'attribute_id', 'language_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Attributes', [
            'foreignKey' => 'attribute_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Attributes',
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
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->notEmptyString('text');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['attribute_id'], 'Attributes'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
