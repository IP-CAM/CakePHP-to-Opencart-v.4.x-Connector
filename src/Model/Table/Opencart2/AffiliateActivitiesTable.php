<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * AffiliateActivities Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\AffiliatesTable&\Cake\ORM\Association\BelongsTo $Affiliates
 *
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateActivity findOrCreate($search, callable $callback = null, $options = [])
 */
class AffiliateActivitiesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractAffiliateActivitiesTable
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

        $this->setTable('affiliate_activity');
        $this->setDisplayField('affiliate_activity_id');
        $this->setPrimaryKey('affiliate_activity_id');

        $this->belongsTo('Affiliates', [
            'foreignKey' => 'affiliate_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Affiliates',
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
            ->integer('affiliate_activity_id')
            ->allowEmptyString('affiliate_activity_id', null, 'create');

        $validator
            ->scalar('key')
            ->maxLength('key', 64)
            ->requirePresence('key', 'create')
            ->notEmptyString('key');

        $validator
            ->scalar('data')
            ->requirePresence('data', 'create')
            ->notEmptyString('data');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

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
        $rules->add($rules->existsIn(['affiliate_id'], 'Affiliates'));

        return $rules;
    }

}
