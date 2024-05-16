<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * OptionValues Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\OptionsTable&\Cake\ORM\Association\BelongsTo $Options
 * @property \CakePHPOpencart\Model\Table\Opencart4\ProductTable&\Cake\ORM\Association\BelongsToMany $Product
 *
 * @method \CakePHPOpencart\Model\Entity\OptionValue get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValue newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValue[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValue[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\OptionValue findOrCreate($search, callable $callback = null, $options = [])
 */
class OptionValuesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractOptionValuesTable
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

        $this->setTable('option_value');
        $this->setDisplayField('option_value_id');
        $this->setPrimaryKey('option_value_id');

        $this->belongsTo('Options', [
            'foreignKey' => 'option_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Options',
        ]);
        $this->belongsToMany('Product', [
            'foreignKey' => 'option_value_id',
            'targetForeignKey' => 'product_id',
            'joinTable' => 'product_option_value',
            'className' => 'CakePHPOpencart.Product',
        ]);
        $this->hasMany('OptionValueDescriptions', [
            'foreignKey' => 'option_value_id',
            'className' => 'CakePHPOpencart.OptionValueDescriptions',
        ]);
        $this->hasOne('OptionValueDescription', [
            'foreignKey' => 'option_value_id',
            'className' => 'CakePHPOpencart.OptionValueDescription',
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
            ->integer('option_value_id')
            ->allowEmptyString('option_value_id', null, 'create');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

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
        $rules->add($rules->existsIn(['option_id'], 'Options'));

        return $rules;
    }

}
