<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticleComments Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ArticlesTable&\Cake\ORM\Association\BelongsTo $Articles
 * @property \CakePHPOpencart\Model\Table\Opencart4\CustomersTable&\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \CakePHPOpencart\Model\Entity\ArticleComment get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleComment newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleComment[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleComment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleComment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleComment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleComment[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleComment findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticleCommentsTable extends Table
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

        $this->setTable('article_comment');
        $this->setDisplayField('article_comment_id');
        $this->setPrimaryKey('article_comment_id');

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Articles',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Customers',
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
            ->integer('article_comment_id')
            ->allowEmptyString('article_comment_id', null, 'create');

        $validator
            ->scalar('comment')
            ->requirePresence('comment', 'create')
            ->notEmptyString('comment');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

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
        $rules->add($rules->existsIn(['article_id'], 'Articles'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }

}
