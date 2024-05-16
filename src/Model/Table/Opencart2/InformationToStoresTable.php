<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * InformationToStores Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\InformationTable&\Cake\ORM\Association\BelongsTo $Information
 * @property \CakePHPOpencart\Model\Table\Opencart2\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\InformationToStore get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToStore newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToStore[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToStore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToStore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToStore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToStore[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\InformationToStore findOrCreate($search, callable $callback = null, $options = [])
 */
class InformationToStoresTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractInformationToStoresTable
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

        $this->setTable('information_to_store');
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

        return $rules;
    }

}
