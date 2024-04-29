<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Layouts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ModuleTable&\Cake\ORM\Association\BelongsToMany $Module
 *
 * @method \CakePHPOpencart\Model\Entity\Layout get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Layout newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Layout[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Layout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Layout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Layout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Layout[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Layout findOrCreate($search, callable $callback = null, $options = [])
 */
class LayoutsTable extends Table
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

        $this->setTable('layout');
        $this->setDisplayField('name');
        $this->setPrimaryKey('layout_id');

        $this->belongsToMany('Module', [
            'foreignKey' => 'layout_id',
            'targetForeignKey' => 'module_id',
            'joinTable' => 'layout_module',
            'className' => 'CakePHPOpencart.Module',
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
            ->integer('layout_id')
            ->allowEmptyString('layout_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }

}
