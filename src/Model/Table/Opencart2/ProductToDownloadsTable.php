<?php
namespace CakePHPOpencart\Model\Table\Opencart2;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductToDownloads Model
 *
 * @property \CakePHPOpencart\Model\Table\Opencart2\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \CakePHPOpencart\Model\Table\Opencart2\DownloadsTable&\Cake\ORM\Association\BelongsTo $Downloads
 *
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload get($primaryKey, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload newEntity($data = null, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload[] newEntities(array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload[] patchEntities($entities, array $data, array $options = [])
 * @method \CakePHPOpencart\Model\Entity\ProductToDownload findOrCreate($search, callable $callback = null, $options = [])
 */
class ProductToDownloadsTable extends Table
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

        $this->setTable('product_to_download');
        $this->setDisplayField('product_id');
        $this->setPrimaryKey(['product_id', 'download_id']);

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Products',
        ]);
        $this->belongsTo('Downloads', [
            'foreignKey' => 'download_id',
            'joinType' => 'INNER',
            'className' => 'CakePHPOpencart.Downloads',
        ]);
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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        $rules->add($rules->existsIn(['download_id'], 'Downloads'));

        return $rules;
    }

}
