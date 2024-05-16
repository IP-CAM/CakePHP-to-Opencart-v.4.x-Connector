<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ProductVieweds Model
 *
 * @method \CakePHPOpencart\Model\Entity\ProductViewed get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductViewed newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductViewed[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductViewed|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductViewed saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductViewed patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductViewed[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductViewed findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductViewedsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractProductViewedsTable
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

        $this->setTable('product_viewed');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey('product_id');
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
            ->integer('product_id')
            ->allowEmptyString('product_id', null, 'create');

        $validator
            ->integer('viewed')
            ->requirePresence('viewed', 'create')
            ->notEmptyString('viewed');

        return $validator;
    }

}
