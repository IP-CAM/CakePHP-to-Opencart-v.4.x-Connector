<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VoucherThemes Model
 *
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\VoucherTheme findOrCreate($search, callable $callback = null, $options = [])
 */
class VoucherThemesTable extends Table
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

        $this->setTable('voucher_theme');
        $this->setDisplayField('voucher_theme_id');
        $this->setPrimaryKey('voucher_theme_id');
        $this->hasMany('VoucherThemeDescriptions', [
            'foreignKey' => 'voucher_theme_id',
            'className' => 'CakePHPOpencart.VoucherThemeDescriptions',
        ]);
        $this->hasOne('VoucherThemeDescription', [
            'foreignKey' => 'voucher_theme_id',
            'className' => 'CakePHPOpencart.VoucherThemeDescription',
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
            ->integer('voucher_theme_id')
            ->allowEmptyString('voucher_theme_id', null, 'create');

        $validator
            ->scalar('image')
            ->maxLength('image', 255)
            ->requirePresence('image', 'create')
            ->notEmptyFile('image');

        return $validator;
    }

}
