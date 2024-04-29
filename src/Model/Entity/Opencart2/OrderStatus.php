<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OrderStatus Entity
 *
 * @property int $order_status_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\OrderStatus $order_status
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 */
class OrderStatus extends \CakePHPOpencart\Model\Entity\OpencartCommon\OrderStatus
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
        'name' => true,
        'order_status' => true,
        'language' => true,
    ];
}
