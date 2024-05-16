<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart2\ModuleTable&\Cake\ORM\Association\BelongsToMany $Module
 *
 * @method \CakePHPOpencart\Model\Entity\Menu get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Menu newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Menu[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Menu|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Menu saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Menu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Menu[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Menu findOrCreate($search, callable $callback = null, $options = [])
 */
class MenusTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractMenusTable
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

        $this->setTable('menu');
        $this->setDisplayField('menu_id');
        $this->setPrimaryKey('menu_id');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
        $this->belongsToMany('Module', [
            'foreignKey' => 'menu_id',
            'targetForeignKey' => 'module_id',
            'joinTable' => 'menu_module',
            'className' => 'CakePHPOpencart.Module',
        ]);
        $this->hasMany('MenuDescriptions', [
            'foreignKey' => 'menu_id',
            'className' => 'CakePHPOpencart.MenuDescriptions',
        ]);
        $this->hasOne('MenuDescription', [
            'foreignKey' => 'menu_id',
            'className' => 'CakePHPOpencart.MenuDescription',
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
            ->integer('menu_id')
            ->allowEmptyString('menu_id', null, 'create');

        $validator
            ->scalar('type')
            ->maxLength('type', 6)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmptyString('sort_order');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
