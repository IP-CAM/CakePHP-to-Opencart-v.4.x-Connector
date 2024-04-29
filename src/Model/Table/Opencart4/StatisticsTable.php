<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Statistics Model
 *
 * @method \CakePHPOpencart\Model\Entity\Statistic get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Statistic newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Statistic[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Statistic|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Statistic saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Statistic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Statistic[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Statistic findOrCreate($search, callable $callback = null, $options = [])
 */
class StatisticsTable extends Table
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

        $this->setTable('statistics');
        $this->setDisplayField('statistics_id');
        $this->setPrimaryKey('statistics_id');
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
            ->integer('statistics_id')
            ->allowEmptyString('statistics_id', null, 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 64)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->decimal('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        return $validator;
    }

}
