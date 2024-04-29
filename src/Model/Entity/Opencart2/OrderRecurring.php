<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OrderRecurring Entity
 *
 * @property int $order_recurring_id
 * @property int $order_id
 * @property string $reference
 * @property int $product_id
 * @property string $product_name
 * @property int $product_quantity
 * @property int $recurring_id
 * @property string $recurring_name
 * @property string $recurring_description
 * @property string $recurring_frequency
 * @property int $recurring_cycle
 * @property int $recurring_duration
 * @property float $recurring_price
 * @property bool $trial
 * @property string $trial_frequency
 * @property int $trial_cycle
 * @property int $trial_duration
 * @property float $trial_price
 * @property int $status
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Recurring $recurring
 */
class OrderRecurring extends \CakePHPOpencart\Model\Entity\OpencartCommon\OrderRecurring
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
        'reference' => true,
        'product_id' => true,
        'product_name' => true,
        'product_quantity' => true,
        'recurring_id' => true,
        'recurring_name' => true,
        'recurring_description' => true,
        'recurring_frequency' => true,
        'recurring_cycle' => true,
        'recurring_duration' => true,
        'recurring_price' => true,
        'trial' => true,
        'trial_frequency' => true,
        'trial_cycle' => true,
        'trial_duration' => true,
        'trial_price' => true,
        'status' => true,
        'date_added' => true,
        'order' => true,
        'product' => true,
        'recurring' => true,
    ];
}
