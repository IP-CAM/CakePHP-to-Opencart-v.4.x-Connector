<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * OrderStatuses Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrderStatusesTable&\Cake\ORM\Association\BelongsTo $OrderStatuses
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\OrderStatus get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderStatus newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderStatus[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OrderStatus findOrCreate($search, callable $callback = null, $options = [])
 */
class OrderStatusesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractOrderStatusesTable
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

        $this->setTable('order_status');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['order_status_id', 'language_id']);

        $this->belongsTo('OrderStatuses', [
            'foreignKey' => 'order_status_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.OrderStatuses',
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
        $rules->add($rules->existsIn(['order_status_id'], 'OrderStatuses'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
