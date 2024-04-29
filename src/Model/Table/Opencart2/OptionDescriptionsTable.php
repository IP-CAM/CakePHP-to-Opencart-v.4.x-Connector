<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OptionDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OptionsTable&\Cake\ORM\Association\BelongsTo $Options
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\OptionDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class OptionDescriptionsTable extends Table
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

        $this->setTable('option_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['option_id', 'language_id']);

        $this->belongsTo('Options', [
            'foreignKey' => 'option_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Options',
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
        $rules->add($rules->existsIn(['option_id'], 'Options'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
