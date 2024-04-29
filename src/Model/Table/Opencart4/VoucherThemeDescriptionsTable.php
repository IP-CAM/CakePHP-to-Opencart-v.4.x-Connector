<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VoucherThemeDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\VoucherThemesTable&\Cake\ORM\Association\BelongsTo $VoucherThemes
 * @property \CakePHPOpencart\Model\Table\Opencart4\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherThemeDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class VoucherThemeDescriptionsTable extends Table
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

        $this->setTable('voucher_theme_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['voucher_theme_id', 'language_id']);

        $this->belongsTo('VoucherThemes', [
            'foreignKey' => 'voucher_theme_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.VoucherThemes',
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
            ->maxLength('name', 32)
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
        $rules->add($rules->existsIn(['voucher_theme_id'], 'VoucherThemes'));
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
