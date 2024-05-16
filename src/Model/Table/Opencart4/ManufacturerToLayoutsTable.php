<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ManufacturerToLayouts Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ManufacturersTable&\Cake\ORM\Association\BelongsTo $Manufacturers
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 * @property \CakePHPOpencart\Model\Table\Opencart4\LayoutsTable&\Cake\ORM\Association\BelongsTo $Layouts
 *
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToLayout findOrCreate($search, callable $callback = null, $options = [])
 */
class ManufacturerToLayoutsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractManufacturerToLayoutsTable
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

        $this->setTable('manufacturer_to_layout');
        $this->setDisplayField('manufacturer_id');
        $this->setPrimaryKey(['manufacturer_id', 'store_id']);

        $this->belongsTo('Manufacturers', [
            'foreignKey' => 'manufacturer_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Manufacturers',
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
        $rules->add($rules->existsIn(['manufacturer_id'], 'Manufacturers'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));
        $rules->add($rules->existsIn(['layout_id'], 'Layouts'));

        return $rules;
    }

}
