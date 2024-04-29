<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ProductImage Entity
 *
 * @property int $product_image_id
 * @property int $product_id
 * @property string|null $image
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 */
class ProductImage extends \CakePHPOpencart\Model\Entity\OpencartCommon\ProductImage
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
        'product_id' => true,
        'image' => true,
        'sort_order' => true,
        'product' => true,
    ];
}
