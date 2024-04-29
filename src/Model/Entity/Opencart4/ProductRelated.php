<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ProductRelated Entity
 *
 * @property int $product_id
 * @property int $related_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Related $related
 */
class ProductRelated extends \CakePHPOpencart\Model\Entity\OpencartCommon\ProductRelated
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'product' => true,
        'related' => true,
    ];
}
