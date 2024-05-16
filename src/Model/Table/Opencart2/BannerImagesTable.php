<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * BannerImages Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\BannersTable&\Cake\ORM\Association\BelongsTo $Banners
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\BannerImage get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\BannerImage newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\BannerImage[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\BannerImage|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\BannerImage saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\BannerImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\BannerImage[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\BannerImage findOrCreate($search, callable $callback = null, $options = [])
 */
class BannerImagesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractBannerImagesTable
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

        $this->setTable('banner_image');
        $this->setDisplayField('title');
        $this->setPrimaryKey('banner_image_id');

        $this->belongsTo('Banners', [
            'foreignKey' => 'banner_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Banners',
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
            ->integer('banner_image_id')
            ->allowEmptyFile('banner_image_id', null, 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 64)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        $validator
            ->integer('sort_order')
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
        $rules->add($rules->existsIn(['banner_id'], 'Banners'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
