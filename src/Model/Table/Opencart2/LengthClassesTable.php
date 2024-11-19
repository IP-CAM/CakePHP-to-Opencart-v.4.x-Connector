<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * LengthClasses Model
 *
 * @method \CakePHPOpencart\Model\Entity\LengthClass get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClass newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClass[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClass|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClass saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClass[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LengthClass findOrCreate($search, callable $callback = null, $options = [])
 */
class LengthClassesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractLengthClassesTable
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

        $this->setTable('length_class');
        $this->setDisplayField('length_class_id');
        $this->setPrimaryKey('length_class_id');
        $this->hasMany('LengthClassDescriptions', [
            'foreignKey' => 'length_class_id',
            'className' => 'CakePHPOpencart.LengthClassDescriptions',
        ]);
        $this->hasOne('LengthClassDescription', [
            'foreignKey' => 'length_class_id',
            'className' => 'CakePHPOpencart.LengthClassDescriptions',
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
            ->integer('length_class_id')
            ->allowEmptyString('length_class_id', null, 'create');

        $validator
            ->decimal('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        return $validator;
    }

}
