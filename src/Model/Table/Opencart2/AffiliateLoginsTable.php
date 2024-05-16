<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * AffiliateLogins Model
 *
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\AffiliateLogin findOrCreate($search, callable $callback = null, $options = [])
 */
class AffiliateLoginsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractAffiliateLoginsTable
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

        $this->setTable('affiliate_login');
        $this->setDisplayField('affiliate_login_id');
        $this->setPrimaryKey('affiliate_login_id');
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
            ->integer('affiliate_login_id')
            ->allowEmptyString('affiliate_login_id', null, 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->integer('total')
            ->requirePresence('total', 'create')
            ->notEmptyString('total');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        $validator
            ->dateTime('date_modified')
            ->requirePresence('date_modified', 'create')
            ->notEmptyDateTime('date_modified');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

}
