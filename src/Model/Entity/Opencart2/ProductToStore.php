<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ProductToStore Entity
 *
 * @property int $product_id
 * @property int $store_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 */
class ProductToStore extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractProductToStore
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
        'store' => true,
    ];
}
