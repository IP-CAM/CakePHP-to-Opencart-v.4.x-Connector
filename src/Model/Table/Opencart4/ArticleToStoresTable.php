<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ArticleToStores Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ArticlesTable&\Cake\ORM\Association\BelongsTo $Articles
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToStore findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticleToStoresTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractArticleToStoresTable
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

        $this->setTable('article_to_store');
        $this->setDisplayField('article_id');
        $this->setPrimaryKey(['article_id', 'store_id']);

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Articles',
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
        $rules->add($rules->existsIn(['article_id'], 'Articles'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }

}
