<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Currencies Model
 *
 * @method \CakePHPOpencart\Model\Entity\Currency get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Currency newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Currency[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Currency|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Currency saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Currency patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Currency[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Currency findOrCreate($search, callable $callback = null, $options = [])
 */
class CurrenciesTable extends Table
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

        $this->setTable('currency');
        $this->setDisplayField('title');
        $this->setPrimaryKey('currency_id');
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
            ->integer('currency_id')
            ->allowEmptyString('currency_id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 32)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('code')
            ->maxLength('code', 3)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('symbol_left')
            ->maxLength('symbol_left', 12)
            ->requirePresence('symbol_left', 'create')
            ->notEmptyString('symbol_left');

        $validator
            ->scalar('symbol_right')
            ->maxLength('symbol_right', 12)
            ->requirePresence('symbol_right', 'create')
            ->notEmptyString('symbol_right');

        $validator
            ->integer('decimal_place')
            ->requirePresence('decimal_place', 'create')
            ->notEmptyString('decimal_place');

        $validator
            ->numeric('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_modified')
            ->requirePresence('date_modified', 'create')
            ->notEmptyDateTime('date_modified');

        return $validator;
    }

}
