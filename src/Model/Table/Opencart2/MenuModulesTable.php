<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * MenuModules Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\MenusTable&\Cake\ORM\Association\BelongsTo $Menus
 *
 * @method \CakePHPOpencart\Model\Entity\MenuModule get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\MenuModule newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MenuModule[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MenuModule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\MenuModule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\MenuModule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MenuModule[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\MenuModule findOrCreate($search, callable $callback = null, $options = [])
 */
class MenuModulesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractMenuModulesTable
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

        $this->setTable('menu_module');
        $this->setDisplayField('menu_module_id');
        $this->setPrimaryKey('menu_module_id');

        $this->belongsTo('Menus', [
            'foreignKey' => 'menu_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Menus',
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
            ->integer('menu_module_id')
            ->allowEmptyString('menu_module_id', null, 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 64)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

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
        $rules->add($rules->existsIn(['menu_id'], 'Menus'));

        return $rules;
    }

}
