<?php
namespace CakePHPOpencart\Model\Table\Opencart4;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DownloadReports Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart4\DownloadsTable&\Cake\ORM\Association\BelongsTo $Downloads
 * @property \CakePHPOpencart\Model\Table\Opencart4\StoresTable&\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \CakePHPOpencart\Model\Entity\DownloadReport get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadReport newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadReport[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadReport|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadReport saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadReport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadReport[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadReport findOrCreate($search, callable $callback = null, $options = [])
 */
class DownloadReportsTable extends Table
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

        $this->setTable('download_report');
        $this->setDisplayField('download_report_id');
        $this->setPrimaryKey('download_report_id');

        $this->belongsTo('Downloads', [
            'foreignKey' => 'download_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Downloads',
        ]);
        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Stores',
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
            ->integer('download_report_id')
            ->allowEmptyString('download_report_id', null, 'create');

        $validator
            ->scalar('ip')
            ->maxLength('ip', 40)
            ->requirePresence('ip', 'create')
            ->notEmptyString('ip');

        $validator
            ->scalar('country')
            ->maxLength('country', 2)
            ->requirePresence('country', 'create')
            ->notEmptyString('country');

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
        $rules->add($rules->existsIn(['download_id'], 'Downloads'));
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }

}
