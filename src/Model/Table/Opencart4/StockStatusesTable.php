<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StockStatuses Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\StockStatusesTable&\Cake\ORM\Association\BelongsTo $StockStatuses
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\StockStatus get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\StockStatus newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\StockStatus[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\StockStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\StockStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\StockStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\StockStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\StockStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class StockStatusesTable extends Table
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

        $this->setTable('stock_status');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['stock_status_id', 'language_id']);

        $this->belongsTo('StockStatuses', [
            'foreignKey' => 'stock_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.StockStatuses',
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
        $rules->add($rules->existsIn(['stock_status_id'], 'StockStatuses'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
