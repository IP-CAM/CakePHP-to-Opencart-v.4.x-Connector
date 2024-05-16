<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * CustomerGroupDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerGroupDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerGroupDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractCustomerGroupDescriptionsTable
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

        $this->setTable('customer_group_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['customer_group_id', 'language_id']);

        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
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
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

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
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
