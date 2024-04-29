<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ManufacturerToStores Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ManufacturersTable&\Cake\ORM\Association\BelongsTo $Manufacturers
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ManufacturerToStore findOrCreate($search, callable $callback = null, $options = [])
 */
class ManufacturerToStoresTable extends Table
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

        $this->setTable('manufacturer_to_store');
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

        return $rules;
    }

}
