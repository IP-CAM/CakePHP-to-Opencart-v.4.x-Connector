<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\TopicsTable&\Cake\ORM\Association\BelongsTo $Topics
 *
 * @method \CakePHPOpencart\Model\Entity\Article get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Article|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Article saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticlesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractArticlesTable
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

        $this->setTable('article');
        $this->setDisplayField('article_id');
        $this->setPrimaryKey('article_id');

        $this->belongsTo('Topics', [
            'foreignKey' => 'topic_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Topics',
        ]);
        $this->hasMany('ArticleDescriptions', [
            'foreignKey' => 'article_id',
            'className' => 'CakePHPOpencart.ArticleDescriptions',
        ]);
        $this->hasOne('ArticleDescription', [
            'foreignKey' => 'article_id',
            'className' => 'CakePHPOpencart.ArticleDescription',
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
            ->integer('article_id')
            ->allowEmptyString('article_id', null, 'create');

        $validator
            ->scalar('author')
            ->maxLength('author', 64)
            ->requirePresence('author', 'create')
            ->notEmptyString('author');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        $validator
            ->dateTime('date_modified')
            ->requirePresence('date_modified', 'create')
            ->notEmptyDateTime('date_modified');

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

        return $rules;
    }

}
