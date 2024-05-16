<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Modules Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\LayoutTable&\Cake\ORM\Association\BelongsToMany $Layout
 * @property \CakePHPOpencart\Model\Table\Opencart2\MenuTable&\Cake\ORM\Association\BelongsToMany $Menu
 *
 * @method \CakePHPOpencart\Model\Entity\Module get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Module newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Module[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Module|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Module saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Module patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Module[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Module findOrCreate($search, callable $callback = null, $options = [])
 */
class ModulesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractModulesTable
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

        $this->setTable('module');
        $this->setDisplayField('name');
        $this->setPrimaryKey('module_id');

        $this->belongsToMany('Layout', [
            'foreignKey' => 'module_id',
            'targetForeignKey' => 'layout_id',
            'joinTable' => 'layout_module',
            'className' => 'CakePHPOpencart.Layout',
        ]);
        $this->belongsToMany('Menu', [
            'foreignKey' => 'module_id',
            'targetForeignKey' => 'menu_id',
            'joinTable' => 'menu_module',
            'className' => 'CakePHPOpencart.Menu',
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
            ->integer('module_id')
            ->allowEmptyString('module_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 32)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('setting')
            ->requirePresence('setting', 'create')
            ->notEmptyString('setting');

        return $validator;
    }

}
