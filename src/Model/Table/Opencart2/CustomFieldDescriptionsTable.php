<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * CustomFieldDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldsTable&\Cake\ORM\Association\BelongsTo $CustomFields
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomFieldDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCustomFieldDescriptionsTable
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

        $this->setTable('custom_field_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['custom_field_id', 'language_id']);

        $this->belongsTo('CustomFields', [
            'foreignKey' => 'custom_field_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomFields',
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
        $rules->add($rules->existsIn(['custom_field_id'], 'CustomFields'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
