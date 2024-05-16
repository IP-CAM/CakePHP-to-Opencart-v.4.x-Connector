<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ArticleToLayouts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ArticlesTable&\Cake\ORM\Association\BelongsTo $Articles
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart4\LayoutsTable&\Cake\ORM\Association\BelongsTo $Layouts
 *
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ArticleToLayout findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticleToLayoutsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractArticleToLayoutsTable
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

        $this->setTable('article_to_layout');
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
        $this->belongsTo('Layouts', [
            'foreignKey' => 'layout_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Layouts',
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
        $rules->add($rules->existsIn(['layout_id'], 'Layouts'));

        return $rules;
    }

}
