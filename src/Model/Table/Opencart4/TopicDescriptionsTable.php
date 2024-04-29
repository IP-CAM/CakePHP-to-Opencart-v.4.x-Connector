<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TopicDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\TopicsTable&\Cake\ORM\Association\BelongsTo $Topics
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\TopicDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\TopicDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class TopicDescriptionsTable extends Table
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

        $this->setTable('topic_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['topic_id', 'language_id']);

        $this->belongsTo('Topics', [
            'foreignKey' => 'topic_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Topics',
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
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('meta_title')
            ->maxLength('meta_title', 255)
            ->requirePresence('meta_title', 'create')
            ->notEmptyString('meta_title');

        $validator
            ->scalar('meta_description')
            ->maxLength('meta_description', 255)
            ->requirePresence('meta_description', 'create')
            ->notEmptyString('meta_description');

        $validator
            ->scalar('meta_keyword')
            ->maxLength('meta_keyword', 255)
            ->requirePresence('meta_keyword', 'create')
            ->notEmptyString('meta_keyword');

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
        $rules->add($rules->existsIn(['topic_id'], 'Topics'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
