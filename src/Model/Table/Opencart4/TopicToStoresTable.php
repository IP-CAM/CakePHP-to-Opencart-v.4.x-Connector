<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * TopicToStores Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\TopicsTable&\Cake\ORM\Association\BelongsTo $Topics
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\TopicToStore get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicToStore newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicToStore[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicToStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicToStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicToStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicToStore[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicToStore findOrCreate($search, callable $callback = null, $options = [])
 */
class TopicToStoresTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractTopicToStoresTable
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

        $this->setTable('topic_to_store');
        $this->setDisplayField('topic_id');
        $this->setPrimaryKey(['topic_id', 'store_id']);

        $this->belongsTo('Topics', [
            'foreignKey' => 'topic_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Topics',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
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
        $rules->add($rules->existsIn(['topic_id'], 'Topics'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }

}
