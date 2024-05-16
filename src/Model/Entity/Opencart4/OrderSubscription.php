<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * OrderSubscription Entity
 *
 * @property int $order_subscription_id
 * @property int $order_product_id
 * @property int $order_id
 * @property int $product_id
 * @property int $subscription_plan_id
 * @property float $trial_price
 * @property float $trial_tax
 * @property string $trial_frequency
 * @property int $trial_cycle
 * @property int $trial_duration
 * @property int $trial_remaining
 * @property bool $trial_status
 * @property float $price
 * @property float $tax
 * @property string $frequency
 * @property int $cycle
 * @property int $duration
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\OrderProduct $order_product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\SubscriptionPlan $subscription_plan
 */
class OrderSubscription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractOrderSubscription
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
        'order_product_id' => true,
        'order_id' => true,
        'product_id' => true,
        'subscription_plan_id' => true,
        'trial_price' => true,
        'trial_tax' => true,
        'trial_frequency' => true,
        'trial_cycle' => true,
        'trial_duration' => true,
        'trial_remaining' => true,
        'trial_status' => true,
        'price' => true,
        'tax' => true,
        'frequency' => true,
        'cycle' => true,
        'duration' => true,
        'order_product' => true,
        'order' => true,
        'product' => true,
        'subscription_plan' => true,
    ];
}
