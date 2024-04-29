<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrderCustomFields Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldsTable&\Cake\ORM\Association\BelongsTo $CustomFields
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldValuesTable&\Cake\ORM\Association\BelongsTo $CustomFieldValues
 *
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderCustomField findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderCustomFieldsTable extends Table
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

        $this->setTable('order_custom_field');
        $this->setDisplayField('name');
        $this->setPrimaryKey('order_custom_field_id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Orders',
        ]);
        $this->belongsTo('CustomFields', [
            'foreignKey' => 'custom_field_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomFields',
        ]);
        $this->belongsTo('CustomFieldValues', [
            'foreignKey' => 'custom_field_value_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomFieldValues',
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
            ->integer('order_custom_field_id')
            ->allowEmptyString('order_custom_field_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('type')
            ->maxLength('type', 32)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('location')
            ->maxLength('location', 16)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

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
        $rules->add($rules->existsIn(['order_id'], 'Orders'));
        $rules->add($rules->existsIn(['custom_field_id'], 'CustomFields'));
        $rules->add($rules->existsIn(['custom_field_value_id'], 'CustomFieldValues'));

        return $rules;
    }

}
