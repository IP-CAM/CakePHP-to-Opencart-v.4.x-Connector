<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Recurring Entity
 *
 * @property int $recurring_id
 * @property float $price
 * @property string $frequency
 * @property int $duration
 * @property int $cycle
 * @property int $trial_status
 * @property float $trial_price
 * @property string $trial_frequency
 * @property int $trial_duration
 * @property int $trial_cycle
 * @property int $status
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order[] $order
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product[] $product
 */
class Recurring extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractRecurring
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
        'price' => true,
        'frequency' => true,
        'duration' => true,
        'cycle' => true,
        'trial_status' => true,
        'trial_price' => true,
        'trial_frequency' => true,
        'trial_duration' => true,
        'trial_cycle' => true,
        'status' => true,
        'sort_order' => true,
        'order' => true,
        'product' => true,
    ];
}
