<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ProductFilter Entity
 *
 * @property int $product_id
 * @property int $filter_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Filter $filter
 */
class ProductFilter extends \CakePHPOpencart\Model\Entity\OpencartCommon\ProductFilter
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
        'filter' => true,
    ];
}
