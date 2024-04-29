<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Topics Model
 *
 * @method \CakePHPOpencart\Model\Entity\Topic get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Topic newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Topic[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Topic|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Topic saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Topic patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Topic[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Topic findOrCreate($search, callable $callback = null, $options = [])
 */
class TopicsTable extends Table
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

        $this->setTable('topic');
        $this->setDisplayField('topic_id');
        $this->setPrimaryKey('topic_id');
        $this->hasMany('TopicDescriptions', [
            'foreignKey' => 'topic_id',
            'className' => 'CakePHPOpencart.TopicDescriptions',
        ]);
        $this->hasOne('TopicDescription', [
            'foreignKey' => 'topic_id',
            'className' => 'CakePHPOpencart.TopicDescription',
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
            ->integer('topic_id')
            ->allowEmptyString('topic_id', null, 'create');

        $validator
            ->integer('sort_order')
            ->notEmptyString('sort_order');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }

}
