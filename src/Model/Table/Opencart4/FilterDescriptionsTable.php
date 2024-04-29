<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilterDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\FiltersTable&\Cake\ORM\Association\BelongsTo $Filters
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \CakePHPOpencart\Model\Table\Opencart4\FilterGroupsTable&\Cake\ORM\Association\BelongsTo $FilterGroups
 *
 * @method \CakePHPOpencart\Model\Entity\FilterDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\FilterDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class FilterDescriptionsTable extends Table
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

        $this->setTable('filter_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['filter_id', 'language_id']);

        $this->belongsTo('Filters', [
            'foreignKey' => 'filter_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Filters',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
        ]);
        $this->belongsTo('FilterGroups', [
            'foreignKey' => 'filter_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.FilterGroups',
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
        $rules->add($rules->existsIn(['filter_id'], 'Filters'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['filter_group_id'], 'FilterGroups'));

        return $rules;
    }

}
