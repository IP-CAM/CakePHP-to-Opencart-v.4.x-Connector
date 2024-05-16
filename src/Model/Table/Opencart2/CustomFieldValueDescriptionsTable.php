<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * CustomFieldValueDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldValuesTable&\Cake\ORM\Association\BelongsTo $CustomFieldValues
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldsTable&\Cake\ORM\Association\BelongsTo $CustomFields
 *
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValueDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomFieldValueDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCustomFieldValueDescriptionsTable
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

        $this->setTable('custom_field_value_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['custom_field_value_id', 'language_id']);

        $this->belongsTo('CustomFieldValues', [
            'foreignKey' => 'custom_field_value_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomFieldValues',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
        ]);
        $this->belongsTo('CustomFields', [
            'foreignKey' => 'custom_field_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomFields',
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
            ->maxLength('name', 128)
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
        $rules->add($rules->existsIn(['custom_field_value_id'], 'CustomFieldValues'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['custom_field_id'], 'CustomFields'));

        return $rules;
    }

}
