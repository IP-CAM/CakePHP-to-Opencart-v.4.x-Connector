<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * CustomFieldCustomerGroups Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldsTable&\Cake\ORM\Association\BelongsTo $CustomFields
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 *
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomFieldCustomerGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomFieldCustomerGroupsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCustomFieldCustomerGroupsTable
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

        $this->setTable('custom_field_customer_group');
        $this->setDisplayField('custom_field_id');
        $this->setPrimaryKey(['custom_field_id', 'customer_group_id']);

        $this->belongsTo('CustomFields', [
            'foreignKey' => 'custom_field_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomFields',
        ]);
        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
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
            ->boolean('required')
            ->requirePresence('required', 'create')
            ->notEmptyString('required');

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
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));

        return $rules;
    }

}
