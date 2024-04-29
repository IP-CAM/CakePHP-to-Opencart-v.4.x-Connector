<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReturnActions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ReturnActionsTable&\Cake\ORM\Association\BelongsTo $ReturnActions
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\ReturnAction get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnAction newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnAction[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnAction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnAction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnAction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnAction[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnAction findOrCreate($search, callable $callback = null, $options = [])
 */
class ReturnActionsTable extends Table
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

        $this->setTable('return_action');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['return_action_id', 'language_id']);

        $this->belongsTo('ReturnActions', [
            'foreignKey' => 'return_action_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ReturnActions',
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
        $rules->add($rules->existsIn(['return_action_id'], 'ReturnActions'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
