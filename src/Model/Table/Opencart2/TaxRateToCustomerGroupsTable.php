<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TaxRateToCustomerGroups Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\TaxRatesTable&\Cake\ORM\Association\BelongsTo $TaxRates
 * @property \CakePHPOpencart\Model\Table\Opencart2\CustomerGroupsTable&\Cake\ORM\Association\BelongsTo $CustomerGroups
 *
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TaxRateToCustomerGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class TaxRateToCustomerGroupsTable extends Table
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

        $this->setTable('tax_rate_to_customer_group');
        $this->setDisplayField('tax_rate_id');
        $this->setPrimaryKey(['tax_rate_id', 'customer_group_id']);

        $this->belongsTo('TaxRates', [
            'foreignKey' => 'tax_rate_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.TaxRates',
        ]);
        $this->belongsTo('CustomerGroups', [
            'foreignKey' => 'customer_group_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.CustomerGroups',
        ]);
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
        $rules->add($rules->existsIn(['tax_rate_id'], 'TaxRates'));
        $rules->add($rules->existsIn(['customer_group_id'], 'CustomerGroups'));

        return $rules;
    }

}
