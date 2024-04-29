<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WeightClasses Model
 *
 * @method \CakePHPOpencart\Model\Entity\WeightClass get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClass newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClass[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClass|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClass saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClass[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\WeightClass findOrCreate($search, callable $callback = null, $options = [])
 */
class WeightClassesTable extends Table
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

        $this->setTable('weight_class');
        $this->setDisplayField('weight_class_id');
        $this->setPrimaryKey('weight_class_id');
        $this->hasMany('WeightClassDescriptions', [
            'foreignKey' => 'weight_class_id',
            'className' => 'CakePHPOpencart.WeightClassDescriptions',
        ]);
        $this->hasOne('WeightClassDescription', [
            'foreignKey' => 'weight_class_id',
            'className' => 'CakePHPOpencart.WeightClassDescription',
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
            ->integer('weight_class_id')
            ->allowEmptyString('weight_class_id', null, 'create');

        $validator
            ->decimal('value')
            ->notEmptyString('value');

        return $validator;
    }

}
