<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * AddressFormats Model
 *
 * @method \CakePHPOpencart\Model\Entity\AddressFormat get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AddressFormat newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AddressFormat[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AddressFormat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AddressFormat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AddressFormat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AddressFormat[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AddressFormat findOrCreate($search, callable $callback = null, $options = [])
 */
class AddressFormatsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractAddressFormatsTable
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

        $this->setTable('address_format');
        $this->setDisplayField('name');
        $this->setPrimaryKey('address_format_id');
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
            ->integer('address_format_id')
            ->allowEmptyString('address_format_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('address_format')
            ->requirePresence('address_format', 'create')
            ->notEmptyString('address_format');

        return $validator;
    }

}
