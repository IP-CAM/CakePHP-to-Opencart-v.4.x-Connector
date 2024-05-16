<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * AttributeGroups Model
 *
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class AttributeGroupsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractAttributeGroupsTable
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

        $this->setTable('attribute_group');
        $this->setDisplayField('attribute_group_id');
        $this->setPrimaryKey('attribute_group_id');
        $this->hasMany('AttributeGroupDescriptions', [
            'foreignKey' => 'attribute_group_id',
            'className' => 'CakePHPOpencart.AttributeGroupDescriptions',
        ]);
        $this->hasOne('AttributeGroupDescription', [
            'foreignKey' => 'attribute_group_id',
            'className' => 'CakePHPOpencart.AttributeGroupDescription',
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
            ->integer('attribute_group_id')
            ->allowEmptyString('attribute_group_id', null, 'create');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
