<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxRules Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\TaxClassesTable&\Cake\ORM\Association\BelongsTo $TaxClasses
 * @property \CakePHPOpencart\Model\Table\Opencart4\TaxRatesTable&\Cake\ORM\Association\BelongsTo $TaxRates
 *
 * @method \CakePHPOpencart\Model\Entity\TaxRule get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRule newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRule[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRule[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRule findOrCreate($search, callable $callback = null, $options = [])
 */
class TaxRulesTable extends Table
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

        $this->setTable('tax_rule');
        $this->setDisplayField('tax_rule_id');
        $this->setPrimaryKey('tax_rule_id');

        $this->belongsTo('TaxClasses', [
            'foreignKey' => 'tax_class_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.TaxClasses',
        ]);
        $this->belongsTo('TaxRates', [
            'foreignKey' => 'tax_rate_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.TaxRates',
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
            ->integer('tax_rule_id')
            ->allowEmptyString('tax_rule_id', null, 'create');

        $validator
            ->scalar('based')
            ->maxLength('based', 10)
            ->requirePresence('based', 'create')
            ->notEmptyString('based');

        $validator
            ->integer('priority')
            ->notEmptyString('priority');

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
        $rules->add($rules->existsIn(['tax_class_id'], 'TaxClasses'));
        $rules->add($rules->existsIn(['tax_rate_id'], 'TaxRates'));

        return $rules;
    }

}
