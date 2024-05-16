<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * FilterGroups Model
 *
 * @method \CakePHPOpencart\Model\Entity\FilterGroup get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroup newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroup[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class FilterGroupsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractFilterGroupsTable
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

        $this->setTable('filter_group');
        $this->setDisplayField('filter_group_id');
        $this->setPrimaryKey('filter_group_id');
        $this->hasMany('FilterGroupDescriptions', [
            'foreignKey' => 'filter_group_id',
            'className' => 'CakePHPOpencart.FilterGroupDescriptions',
        ]);
        $this->hasOne('FilterGroupDescription', [
            'foreignKey' => 'filter_group_id',
            'className' => 'CakePHPOpencart.FilterGroupDescription',
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
            ->integer('filter_group_id')
            ->allowEmptyString('filter_group_id', null, 'create');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
