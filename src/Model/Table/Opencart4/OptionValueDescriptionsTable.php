<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OptionValueDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\OptionValuesTable&\Cake\ORM\Association\BelongsTo $OptionValues
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 * @property \CakePHPOpencart\Model\Table\Opencart4\OptionsTable&\Cake\ORM\Association\BelongsTo $Options
 *
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValueDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class OptionValueDescriptionsTable extends Table
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

        $this->setTable('option_value_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['option_value_id', 'language_id']);

        $this->belongsTo('OptionValues', [
            'foreignKey' => 'option_value_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.OptionValues',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
        ]);
        $this->belongsTo('Options', [
            'foreignKey' => 'option_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Options',
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
            ->maxLength('name', 128)
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
        $rules->add($rules->existsIn(['option_value_id'], 'OptionValues'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));
        $rules->add($rules->existsIn(['option_id'], 'Options'));

        return $rules;
    }

}
