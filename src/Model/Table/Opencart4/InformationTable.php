<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Information Model
 *
 * @method \CakePHPOpencart\Model\Entity\Information get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Information newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Information[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Information|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Information saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Information patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Information[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Information findOrCreate($search, callable $callback = null, $options = [])
 */
class InformationTable extends Table
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

        $this->setTable('information');
        $this->setDisplayField('information_id');
        $this->setPrimaryKey('information_id');
        $this->hasMany('InformationDescriptions', [
            'foreignKey' => 'information_id',
            'className' => 'CakePHPOpencart.InformationDescriptions',
        ]);
        $this->hasOne('InformationDescription', [
            'foreignKey' => 'information_id',
            'className' => 'CakePHPOpencart.InformationDescription',
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
            ->integer('information_id')
            ->allowEmptyString('information_id', null, 'create');

        $validator
            ->integer('bottom')
            ->notEmptyString('bottom');

        $validator
            ->integer('sort_order')
            ->notEmptyString('sort_order');

        $validator
            ->boolean('status')
            ->notEmptyString('status');

        return $validator;
    }

}
