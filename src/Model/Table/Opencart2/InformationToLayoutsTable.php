<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InformationToLayouts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\InformationTable&\Cake\ORM\Association\BelongsTo $Information
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart2\LayoutsTable&\Cake\ORM\Association\BelongsTo $Layouts
 *
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToLayout findOrCreate($search, callable $callback = null, $options = [])
 */
class InformationToLayoutsTable extends Table
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

        $this->setTable('information_to_layout');
        $this->setDisplayField('information_id');
        $this->setPrimaryKey(['information_id', 'store_id']);

        $this->belongsTo('Information', [
            'foreignKey' => 'information_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Information',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
        ]);
        $this->belongsTo('Layouts', [
            'foreignKey' => 'layout_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Layouts',
        ]);
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
        $rules->add($rules->existsIn(['information_id'], 'Information'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['layout_id'], 'Layouts'));

        return $rules;
    }

}
