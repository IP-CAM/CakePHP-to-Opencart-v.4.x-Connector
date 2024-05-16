<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ExtensionPaths Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ExtensionInstallsTable&\Cake\ORM\Association\BelongsTo $ExtensionInstalls
 *
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionPath findOrCreate($search, callable $callback = null, $options = [])
 */
class ExtensionPathsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractExtensionPathsTable
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

        $this->setTable('extension_path');
        $this->setDisplayField('extension_path_id');
        $this->setPrimaryKey('extension_path_id');

        $this->belongsTo('ExtensionInstalls', [
            'foreignKey' => 'extension_install_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ExtensionInstalls',
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
            ->integer('extension_path_id')
            ->allowEmptyString('extension_path_id', null, 'create');

        $validator
            ->scalar('path')
            ->maxLength('path', 255)
            ->requirePresence('path', 'create')
            ->notEmptyString('path');

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
        $rules->add($rules->existsIn(['extension_install_id'], 'ExtensionInstalls'));

        return $rules;
    }

}
