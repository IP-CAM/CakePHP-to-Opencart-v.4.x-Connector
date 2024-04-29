<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DownloadDescriptions Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\DownloadsTable&\Cake\ORM\Association\BelongsTo $Downloads
 * @property \CakePHPOpencart\Model\Table\Opencart2\LanguagesTable&\Cake\ORM\Association\BelongsTo $Languages
 *
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\DownloadDescription findOrCreate($search, callable $callback = null, $options = [])
 */
class DownloadDescriptionsTable extends Table
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

        $this->setTable('download_description');
        $this->setDisplayField('name');
        $this->setPrimaryKey(['download_id', 'language_id']);

        $this->belongsTo('Downloads', [
            'foreignKey' => 'download_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Downloads',
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Languages',
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
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['language_id'], 'Languages'));

        return $rules;
    }

}
