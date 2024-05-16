<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * AttributeDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\AttributesTable&\Cake\ORM\Association\BelongsTo $Attributes
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AttributeDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class AttributeDescriptionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractAttributeDescriptionsTable
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

        $this->setTable('attribute_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['attribute_id', 'language_id']);

        $this->belongsTo('Attributes', [
            'foreignKey' => 'attribute_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Attributes',
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
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['attribute_id'], 'Attributes'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
