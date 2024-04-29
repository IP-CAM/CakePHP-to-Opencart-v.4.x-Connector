<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MarketingReports Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\MarketingsTable&\Cake\ORM\Association\BelongsTo $Marketings
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\MarketingReport get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\MarketingReport newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MarketingReport[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MarketingReport|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\MarketingReport saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\MarketingReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MarketingReport[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MarketingReport findOrCreate($search, callable $callback = null, $options = [])
 */
class MarketingReportsTable extends Table
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

        $this->setTable('marketing_report');
        $this->setDisplayField('marketing_report_id');
        $this->setPrimaryKey('marketing_report_id');

        $this->belongsTo('Marketings', [
            'foreignKey' => 'marketing_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Marketings',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
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
            ->integer('marketing_report_id')
            ->allowEmptyString('marketing_report_id', null, 'create');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->scalar('country')
            ->maxLength('country', 2)
            ->requirePresence('country', 'create')
            ->notEmptyString('country');

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
        $rules->add($rules->existsIn(['marketing_id'], 'Marketings'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }

}
