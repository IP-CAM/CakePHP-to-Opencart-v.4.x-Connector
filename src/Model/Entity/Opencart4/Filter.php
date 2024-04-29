<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Filter Entity
 *
 * @property int $filter_id
 * @property int $filter_group_id
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\FilterGroup $filter_group
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Category[] $category
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product[] $product
 */
class Filter extends \CakePHPOpencart\Model\Entity\OpencartCommon\Filter
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
        'filter_group_id' => true,
        'sort_order' => true,
        'filter_group' => true,
        'category' => true,
        'product' => true,
    ];
}
