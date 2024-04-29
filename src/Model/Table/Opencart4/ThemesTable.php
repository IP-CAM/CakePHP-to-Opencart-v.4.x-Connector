<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Themes Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart4\VoucherTable&\Cake\ORM\Association\BelongsToMany $Voucher
 *
 * @method \CakePHPOpencart\Model\Entity\Theme get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Theme newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Theme[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Theme|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Theme saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Theme patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Theme[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Theme findOrCreate($search, callable $callback = null, $options = [])
 */
class ThemesTable extends Table
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

        $this->setTable('theme');
        $this->setDisplayField('theme_id');
        $this->setPrimaryKey('theme_id');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
        $this->belongsToMany('Voucher', [
            'foreignKey' => 'theme_id',
            'targetForeignKey' => 'voucher_id',
            'joinTable' => 'voucher_theme',
            'className' => 'CakePHPOpencart.Voucher',
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
            ->integer('theme_id')
            ->allowEmptyString('theme_id', null, 'create');

        $validator
            ->scalar('route')
            ->maxLength('route', 64)
            ->requirePresence('route', 'create')
            ->notEmptyString('route');

        $validator
            ->scalar('code')
            ->maxLength('code', 16777215)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

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
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }

}
