<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Option Entity
 *
 * @property int $option_id
 * @property string $type
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order[] $order
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product[] $product
 */
class Option extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractOption
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
        'type' => true,
        'sort_order' => true,
        'order' => true,
        'product' => true,
    ];
}
