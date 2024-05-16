<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ProductSubscription Entity
 *
 * @property int $product_id
 * @property int $subscription_plan_id
 * @property int $customer_group_id
 * @property float $trial_price
 * @property float $price
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\SubscriptionPlan $subscription_plan
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomerGroup $customer_group
 */
class ProductSubscription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractProductSubscription
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
        'trial_price' => true,
        'price' => true,
        'product' => true,
        'subscription_plan' => true,
        'customer_group' => true,
    ];
}
