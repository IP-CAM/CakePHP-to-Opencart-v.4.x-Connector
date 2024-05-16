<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ApiIps Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ApisTable&\Cake\ORM\Association\BelongsTo $Apis
 *
 * @method \CakePHPOpencart\Model\Entity\ApiIp get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiIp newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiIp[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiIp|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiIp saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiIp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiIp[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ApiIp findOrCreate($search, callable $callback = null, $options = [])
 */
class ApiIpsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractApiIpsTable
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

        $this->setTable('api_ip');
        $this->setDisplayField('api_ip_id');
        $this->setPrimaryKey('api_ip_id');

        $this->belongsTo('Apis', [
            'foreignKey' => 'api_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Apis',
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
            ->integer('api_ip_id')
            ->allowEmptyString('api_ip_id', null, 'create');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

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
        $rules->add($rules->existsIn(['api_id'], 'Apis'));

        return $rules;
    }

}
