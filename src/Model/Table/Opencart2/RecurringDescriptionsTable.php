<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * RecurringDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\RecurringsTable&\Cake\ORM\Association\BelongsTo $Recurrings
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\RecurringDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class RecurringDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractRecurringDescriptionsTable
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

        $this->setTable('recurring_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['recurring_id', 'language_id']);

        $this->belongsTo('Recurrings', [
            'foreignKey' => 'recurring_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Recurrings',
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
            ->maxLength('name', 255)
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
        $rules->add($rules->existsIn(['recurring_id'], 'Recurrings'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
