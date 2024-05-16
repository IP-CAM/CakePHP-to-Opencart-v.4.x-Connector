<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Attributes Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\AttributeGroupsTable&\Cake\ORM\Association\BelongsTo $AttributeGroups
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \CakePHPOpencart\Model\Entity\Attribute get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Attribute newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Attribute[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Attribute|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Attribute saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Attribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Attribute[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Attribute findOrCreate($search, callable $callback = null, $options = [])
 */
class AttributesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractAttributesTable
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

        $this->setTable('attribute');
        $this->setDisplayField('attribute_id');
        $this->setPrimaryKey('attribute_id');

        $this->belongsTo('AttributeGroups', [
            'foreignKey' => 'attribute_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.AttributeGroups',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'attribute_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'product_attribute',
            'className' => 'CakePHPOpencart.Product',
        ]);
        $this->hasMany('AttributeDescriptions', [
            'foreignKey' => 'attribute_id',
            'className' => 'CakePHPOpencart.AttributeDescriptions',
        ]);
        $this->hasOne('AttributeDescription', [
            'foreignKey' => 'attribute_id',
            'className' => 'CakePHPOpencart.AttributeDescription',
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
            ->integer('attribute_id')
            ->allowEmptyString('attribute_id', null, 'create');

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
        $rules->add($rules->existsIn(['attribute_group_id'], 'AttributeGroups'));

        return $rules;
    }

}
