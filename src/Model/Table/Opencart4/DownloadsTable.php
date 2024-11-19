<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Downloads Model
 *
 * @method \CakePHPOpencart\Model\Entity\Download get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Download newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Download[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Download|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Download saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\Download patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Download[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\Download findOrCreate($search, callable $callback = null, $options = [])
 */
class DownloadsTable extends \CakePHPOpencart\Model\Table\OpencartAbstract\AbstractDownloadsTable
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

        $this->setTable('download');
        $this->setDisplayField('download_id');
        $this->setPrimaryKey('download_id');
        $this->hasMany('DownloadDescriptions', [
            'foreignKey' => 'download_id',
            'className' => 'CakePHPOpencart.DownloadDescriptions',
        ]);
        $this->hasOne('DownloadDescription', [
            'foreignKey' => 'download_id',
            'className' => 'CakePHPOpencart.DownloadDescriptions',
            'conditions' => [
                // to be populated by CakePHPOpencart\Connector
            ],
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
            ->integer('download_id')
            ->allowEmptyString('download_id', null, 'create');

        $validator
            ->scalar('filename')
            ->maxLength('filename', 160)
            ->requirePresence('filename', 'create')
            ->notEmptyFile('filename');

        $validator
            ->scalar('mask')
            ->maxLength('mask', 128)
            ->requirePresence('mask', 'create')
            ->notEmptyString('mask');

        $validator
            ->dateTime('date_added')
            ->requirePresence('date_added', 'create')
            ->notEmptyDateTime('date_added');

        return $validator;
    }

}
