<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerGroups Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomFieldTable&\Cake\ORM\Association\BelongsToMany $CustomField
 *
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerGroupsTable extends Table
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

        $this->setTable('customer_group');
        $this->setDisplayField('customer_group_id');
        $this->setPrimaryKey('customer_group_id');

        $this->belongsToMany('CustomField', [
            'foreignKey' => 'customer_group_id',
            'targetForeignKey' => 'custom_field_id',
            'joinTable' => 'custom_field_customer_group',
            'className' => 'CakePHPOpencart.CustomField',
        ]);
        $this->hasMany('CustomerGroupDescriptions', [
            'foreignKey' => 'customer_group_id',
            'className' => 'CakePHPOpencart.CustomerGroupDescriptions',
        ]);
        $this->hasOne('CustomerGroupDescription', [
            'foreignKey' => 'customer_group_id',
            'className' => 'CakePHPOpencart.CustomerGroupDescription',
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
            ->integer('customer_group_id')
            ->allowEmptyString('customer_group_id', null, 'create');

        $validator
            ->integer('approval')
            ->requirePresence('approval', 'create')
            ->notEmptyString('approval');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
