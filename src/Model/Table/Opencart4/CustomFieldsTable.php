<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * CustomFields Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomerGroupTable&\Cake\ORM\Association\BelongsToMany $CustomerGroup
 *
 * @method \CakePHPOpencart\Model\Entity\CustomField get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomField newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomField[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomField|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomField saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomField[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomField findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomFieldsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCustomFieldsTable
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

        $this->setTable('custom_field');
        $this->setDisplayField('custom_field_id');
        $this->setPrimaryKey('custom_field_id');

        $this->belongsToMany('CustomerGroup', [
            'foreignKey' => 'custom_field_id',
            'targetForeignKey' => 'customer_group_id',
            'joinTable' => 'custom_field_customer_group',
            'className' => 'CakePHPOpencart.CustomerGroup',
        ]);
        $this->hasMany('CustomFieldDescriptions', [
            'foreignKey' => 'custom_field_id',
            'className' => 'CakePHPOpencart.CustomFieldDescriptions',
        ]);
        $this->hasOne('CustomFieldDescription', [
            'foreignKey' => 'custom_field_id',
            'className' => 'CakePHPOpencart.CustomFieldDescriptions',
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
            ->integer('custom_field_id')
            ->allowEmptyString('custom_field_id', null, 'create');

        $validator
            ->scalar('type')
            ->maxLength('type', 32)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('validation')
            ->maxLength('validation', 255)
            ->requirePresence('validation', 'create')
            ->notEmptyString('validation');

        $validator
            ->scalar('location')
            ->maxLength('location', 10)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
