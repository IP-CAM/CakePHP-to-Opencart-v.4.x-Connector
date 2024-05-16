<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * CustomFieldValues Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomFieldsTable&\Cake\ORM\Association\BelongsTo $CustomFields
 *
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldValue findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomFieldValuesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCustomFieldValuesTable
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

        $this->setTable('custom_field_value');
        $this->setDisplayField('custom_field_value_id');
        $this->setPrimaryKey('custom_field_value_id');

        $this->belongsTo('CustomFields', [
            'foreignKey' => 'custom_field_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomFields',
        ]);
        $this->hasMany('CustomFieldValueDescriptions', [
            'foreignKey' => 'custom_field_value_id',
            'className' => 'CakePHPOpencart.CustomFieldValueDescriptions',
        ]);
        $this->hasOne('CustomFieldValueDescription', [
            'foreignKey' => 'custom_field_value_id',
            'className' => 'CakePHPOpencart.CustomFieldValueDescription',
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
            ->integer('custom_field_value_id')
            ->allowEmptyString('custom_field_value_id', null, 'create');

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
        $rules->add($rules->existsIn(['custom_field_id'], 'CustomFields'));

        return $rules;
    }

}
