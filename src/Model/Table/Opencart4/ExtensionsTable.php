<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Extensions Model
 *
 * @method \CakePHPOpencart\Model\Entity\Extension get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Extension newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Extension[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Extension|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Extension saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Extension patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Extension[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Extension findOrCreate($search, callable $callback = null, $options = [])
 */
class ExtensionsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractExtensionsTable
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

        $this->setTable('extension');
        $this->setDisplayField('extension_id');
        $this->setPrimaryKey('extension_id');
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
            ->integer('extension_id')
            ->allowEmptyString('extension_id', null, 'create');

        $validator
            ->scalar('extension')
            ->maxLength('extension', 255)
            ->requirePresence('extension', 'create')
            ->notEmptyString('extension');

        $validator
            ->scalar('type')
            ->maxLength('type', 32)
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('code')
            ->maxLength('code', 128)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        return $validator;
    }

}
