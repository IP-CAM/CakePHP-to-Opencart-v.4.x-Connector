<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ReturnStatuses Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ReturnStatusesTable&\Cake\ORM\Association\BelongsTo $ReturnStatuses
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ReturnStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class ReturnStatusesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractReturnStatusesTable
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

        $this->setTable('return_status');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['return_status_id', 'language_id']);

        $this->belongsTo('ReturnStatuses', [
            'foreignKey' => 'return_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ReturnStatuses',
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
            ->maxLength('name', 32)
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
        $rules->add($rules->existsIn(['return_status_id'], 'ReturnStatuses'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
