<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Options Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\OrderTable&\Cake\ORM\Association\BelongsToMany $Order
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \CakePHPOpencart\Model\Entity\Option get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Option newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Option[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Option|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Option saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Option patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Option[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Option findOrCreate($search, callable $callback = null, $options = [])
 */
class OptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractOptionsTable
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

        $this->setTable('option');
        $this->setDisplayField('option_id');
        $this->setPrimaryKey('option_id');

        $this->belongsToMany('Order', [
            'foreignKey' => 'option_id',
            'targetForeignKey' => 'order_id',
            'joinTable' => 'order_option',
            'className' => 'CakePHPOpencart.Order',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'option_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'product_option',
            'className' => 'CakePHPOpencart.Product',
        ]);
        $this->hasMany('OptionDescriptions', [
            'foreignKey' => 'option_id',
            'className' => 'CakePHPOpencart.OptionDescriptions',
        ]);
        $this->hasOne('OptionDescription', [
            'foreignKey' => 'option_id',
            'className' => 'CakePHPOpencart.OptionDescriptions',
            'conditions' => [
                // to be populated by CakePHPOpencart\Connector
            ],
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
            ->integer('option_id')
            ->allowEmptyString('option_id', null, 'create');

        $validator
            ->scalar('type')
            ->maxLength('type', 32)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        return $validator;
    }

}
