<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * WeightClassDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\WeightClassesTable&\Cake\ORM\Association\BelongsTo $WeightClasses
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClassDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class WeightClassDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractWeightClassDescriptionsTable
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

        $this->setTable('weight_class_description');
        $this->setDisplayField('title');
        $this->setPrimaryKey(['weight_class_id', 'language_id']);

        $this->belongsTo('WeightClasses', [
            'foreignKey' => 'weight_class_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.WeightClasses',
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
            ->scalar('title')
            ->maxLength('title', 32)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('unit')
            ->maxLength('unit', 4)
            ->requirePresence('unit', 'create')
            ->notEmptyString('unit');

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
        $rules->add($rules->existsIn(['weight_class_id'], 'WeightClasses'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
