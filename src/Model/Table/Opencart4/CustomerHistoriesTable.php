<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CustomerHistories Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\CustomerHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class CustomerHistoriesTable extends Table
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

        $this->setTable('customer_history');
        $this->setDisplayField('customer_history_id');
        $this->setPrimaryKey('customer_history_id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
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
            ->integer('customer_history_id')
            ->allowEmptyString('customer_history_id', null, 'create');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }

}
