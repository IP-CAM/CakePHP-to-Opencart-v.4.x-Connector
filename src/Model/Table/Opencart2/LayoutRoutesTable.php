<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LayoutRoutes Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\LayoutsTable&\Cake\ORM\Association\BelongsTo $Layouts
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\LayoutRoute findOrCreate($search, callable $callback = null, $options = [])
 */
class LayoutRoutesTable extends Table
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

        $this->setTable('layout_route');
        $this->setDisplayField('layout_route_id');
        $this->setPrimaryKey('layout_route_id');

        $this->belongsTo('Layouts', [
            'foreignKey' => 'layout_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Layouts',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
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
            ->integer('layout_route_id')
            ->allowEmptyString('layout_route_id', null, 'create');

        $validator
            ->scalar('route')
            ->maxLength('route', 64)
            ->requirePresence('route', 'create')
            ->notEmptyString('route');

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
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }

}
