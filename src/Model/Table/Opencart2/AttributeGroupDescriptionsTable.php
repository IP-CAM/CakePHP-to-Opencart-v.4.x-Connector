<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AttributeGroupDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\AttributeGroupsTable&\Cake\ORM\Association\BelongsTo $AttributeGroups
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeGroupDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class AttributeGroupDescriptionsTable extends Table
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

        $this->setTable('attribute_group_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['attribute_group_id', 'language_id']);

        $this->belongsTo('AttributeGroups', [
            'foreignKey' => 'attribute_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.AttributeGroups',
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
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
