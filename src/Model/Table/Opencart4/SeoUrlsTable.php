<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SeoUrls Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\SeoUrl get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SeoUrl newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SeoUrl[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SeoUrl|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SeoUrl saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\SeoUrl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SeoUrl[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\SeoUrl findOrCreate($search, callable $callback = null, $options = [])
 */
class SeoUrlsTable extends Table
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

        $this->setTable('seo_url');
        $this->setDisplayField('seo_url_id');
        $this->setPrimaryKey('seo_url_id');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
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
            ->integer('seo_url_id')
            ->allowEmptyString('seo_url_id', null, 'create');

        $validator
            ->scalar('key')
            ->maxLength('key', 64)
            ->requirePresence('key', 'create')
            ->notEmptyString('key');

        $validator
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('keyword')
            ->maxLength('keyword', 768)
            ->requirePresence('keyword', 'create')
            ->notEmptyString('keyword');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

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
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
