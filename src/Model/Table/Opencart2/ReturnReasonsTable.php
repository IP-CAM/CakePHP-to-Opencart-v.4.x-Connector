<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ReturnReasons Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ReturnReasonsTable&\Cake\ORM\Association\BelongsTo $ReturnReasons
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\ReturnReason get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnReason newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnReason[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnReason|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnReason saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnReason patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnReason[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnReason findOrCreate($search, callable $callback = null, $options = [])
 */
class ReturnReasonsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractReturnReasonsTable
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

        $this->setTable('return_reason');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['return_reason_id', 'language_id']);

        $this->belongsTo('ReturnReasons', [
            'foreignKey' => 'return_reason_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ReturnReasons',
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
        $rules->add($rules->existsIn(['return_reason_id'], 'ReturnReasons'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
