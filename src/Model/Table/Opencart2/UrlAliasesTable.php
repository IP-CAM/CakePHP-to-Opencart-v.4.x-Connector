<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * UrlAliases Model
 *
 * @method \CakePHPOpencart\Model\Entity\UrlAlias get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UrlAlias newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UrlAlias[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UrlAlias|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UrlAlias saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\UrlAlias patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UrlAlias[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\UrlAlias findOrCreate($search, callable $callback = null, $options = [])
 */
class UrlAliasesTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractUrlAliasesTable
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

        $this->setTable('url_alias');
        $this->setDisplayField('url_alias_id');
        $this->setPrimaryKey('url_alias_id');
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
            ->integer('url_alias_id')
            ->allowEmptyString('url_alias_id', null, 'create');

        $validator
            ->scalar('query')
            ->maxLength('query', 255)
            ->requirePresence('query', 'create')
            ->notEmptyString('query');

        $validator
            ->scalar('keyword')
            ->maxLength('keyword', 255)
            ->requirePresence('keyword', 'create')
            ->notEmptyString('keyword');

        return $validator;
    }

}
