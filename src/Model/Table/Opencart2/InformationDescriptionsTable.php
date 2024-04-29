<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformationDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\InformationTable&\Cake\ORM\Association\BelongsTo $Information
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\InformationDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class InformationDescriptionsTable extends Table
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

        $this->setTable('information_description');
        $this->setDisplayField('title');
        $this->setPrimaryKey(['information_id', 'language_id']);

        $this->belongsTo('Information', [
            'foreignKey' => 'information_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Information',
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
            ->scalar('title')
            ->maxLength('title', 64)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

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
        $rules->add($rules->existsIn(['information_id'], 'Information'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
