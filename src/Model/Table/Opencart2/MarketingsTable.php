<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Marketings Model
 *
 * @method \CakePHPOpencart\Model\Entity\Marketing get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Marketing newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Marketing[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Marketing|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Marketing saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Marketing patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Marketing[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Marketing findOrCreate($search, callable $callback = null, $options = [])
 */
class MarketingsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractMarketingsTable
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

        $this->setTable('marketing');
        $this->setDisplayField('name');
        $this->setPrimaryKey('marketing_id');
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
            ->integer('marketing_id')
            ->allowEmptyString('marketing_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('code')
            ->maxLength('code', 64)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->integer('clicks')
            ->notEmptyString('clicks');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        return $validator;
    }

}
