<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Antispams Model
 *
 * @method \CakePHPOpencart\Model\Entity\Antispam get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Antispam newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Antispam[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Antispam|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Antispam saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Antispam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Antispam[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Antispam findOrCreate($search, callable $callback = null, $options = [])
 */
class AntispamsTable extends Table
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

        $this->setTable('antispam');
        $this->setDisplayField('antispam_id');
        $this->setPrimaryKey('antispam_id');
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
            ->integer('antispam_id')
            ->allowEmptyString('antispam_id', null, 'create');

        $validator
            ->scalar('keyword')
            ->maxLength('keyword', 64)
            ->requirePresence('keyword', 'create')
            ->notEmptyString('keyword');

        return $validator;
    }

}
