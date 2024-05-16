<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OrderHistory Entity
 *
 * @property int $order_history_id
 * @property int $order_id
 * @property int $order_status_id
 * @property bool $notify
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart2\OrderStatus $order_status
 */
class OrderHistory extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractOrderHistory
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
        'order_status_id' => true,
        'notify' => true,
        'comment' => true,
        'date_added' => true,
        'order' => true,
        'order_status' => true,
    ];
}
