<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * LayoutModules Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\LayoutsTable&\Cake\ORM\Association\BelongsTo $Layouts
 *
 * @method \CakePHPOpencart\Model\Entity\LayoutModule get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutModule newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutModule[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutModule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutModule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutModule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutModule[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutModule findOrCreate($search, callable $callback = null, $options = [])
 */
class LayoutModulesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractLayoutModulesTable
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

        $this->setTable('layout_module');
        $this->setDisplayField('layout_module_id');
        $this->setPrimaryKey('layout_module_id');

        $this->belongsTo('Layouts', [
            'foreignKey' => 'layout_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Layouts',
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
            ->integer('layout_module_id')
            ->allowEmptyString('layout_module_id', null, 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 64)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('position')
            ->maxLength('position', 14)
            ->requirePresence('position', 'create')
            ->notEmptyString('position');

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
        $rules->add($rules->existsIn(['layout_id'], 'Layouts'));

        return $rules;
    }

}
