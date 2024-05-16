<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * ExtensionInstalls Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\ExtensionsTable&\Cake\ORM\Association\BelongsTo $Extensions
 * @property \CakePHPOpencart\Model\Table\Opencart4\ExtensionDownloadsTable&\Cake\ORM\Association\BelongsTo $ExtensionDownloads
 *
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ExtensionInstall findOrCreate($search, callable $callback = null, $options = [])
 */
class ExtensionInstallsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractExtensionInstallsTable
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

        $this->setTable('extension_install');
        $this->setDisplayField('name');
        $this->setPrimaryKey('extension_install_id');

        $this->belongsTo('Extensions', [
            'foreignKey' => 'extension_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Extensions',
        ]);
        $this->belongsTo('ExtensionDownloads', [
            'foreignKey' => 'extension_download_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.ExtensionDownloads',
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
            ->integer('extension_install_id')
            ->allowEmptyString('extension_install_id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 128)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 255)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('version')
            ->maxLength('version', 255)
            ->requirePresence('version', 'create')
            ->notEmptyString('version');

        $validator
            ->scalar('author')
            ->maxLength('author', 255)
            ->requirePresence('author', 'create')
            ->notEmptyString('author');

        $validator
            ->scalar('link')
            ->maxLength('link', 255)
            ->requirePresence('link', 'create')
            ->notEmptyString('link');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

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
        $rules->add($rules->existsIn(['extension_id'], 'Extensions'));
        $rules->add($rules->existsIn(['extension_download_id'], 'ExtensionDownloads'));

        return $rules;
    }

}
