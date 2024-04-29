<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * OrderTotal Entity
 *
 * @property int $order_total_id
 * @property int $order_id
 * @property string $extension
 * @property string $code
 * @property string $title
 * @property float $value
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 */
class OrderTotal extends \CakePHPOpencart\Model\Entity\OpencartCommon\OrderTotal
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
        'order_id' => true,
        'extension' => true,
        'code' => true,
        'title' => true,
        'value' => true,
        'sort_order' => true,
        'order' => true,
    ];
}
