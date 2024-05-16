<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * LengthClassDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\LengthClassesTable&\Cake\ORM\Association\BelongsTo $LengthClasses
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClassDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class LengthClassDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractLengthClassDescriptionsTable
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

        $this->setTable('length_class_description');
        $this->setDisplayField('title');
        $this->setPrimaryKey(['length_class_id', 'language_id']);

        $this->belongsTo('LengthClasses', [
            'foreignKey' => 'length_class_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.LengthClasses',
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
        $rules->add($rules->existsIn(['length_class_id'], 'LengthClasses'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
