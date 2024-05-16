<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * FilterGroupDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\FilterGroupsTable&\Cake\ORM\Association\BelongsTo $FilterGroups
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterGroupDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class FilterGroupDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractFilterGroupDescriptionsTable
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

        $this->setTable('filter_group_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['filter_group_id', 'language_id']);

        $this->belongsTo('FilterGroups', [
            'foreignKey' => 'filter_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.FilterGroups',
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
        $rules->add($rules->existsIn(['filter_group_id'], 'FilterGroups'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
