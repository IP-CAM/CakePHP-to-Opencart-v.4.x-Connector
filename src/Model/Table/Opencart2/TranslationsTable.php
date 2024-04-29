<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Translations Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\Translation get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Translation newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Translation[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Translation|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Translation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Translation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Translation[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Translation findOrCreate($search, callable $callback = null, $options = [])
 */
class TranslationsTable extends Table
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

        $this->setTable('translation');
        $this->setDisplayField('translation_id');
        $this->setPrimaryKey('translation_id');

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
            ->integer('translation_id')
            ->allowEmptyString('translation_id', null, 'create');

        $validator
            ->scalar('route')
            ->maxLength('route', 64)
            ->requirePresence('route', 'create')
            ->notEmptyString('route');

        $validator
            ->scalar('key')
            ->maxLength('key', 64)
            ->requirePresence('key', 'create')
            ->notEmptyString('key');

        $validator
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

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
