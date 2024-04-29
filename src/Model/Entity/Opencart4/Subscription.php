<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Subscription Entity
 *
 * @property int $subscription_id
 * @property int $order_id
 * @property int $order_product_id
 * @property int $store_id
 * @property int $customer_id
 * @property int $payment_address_id
 * @property string $payment_method
 * @property int $shipping_address_id
 * @property string $shipping_method
 * @property int $product_id
 * @property int $quantity
 * @property int $subscription_plan_id
 * @property float $trial_price
 * @property string $trial_frequency
 * @property int $trial_cycle
 * @property int $trial_duration
 * @property int $trial_remaining
 * @property bool $trial_status
 * @property float $price
 * @property string $frequency
 * @property int $cycle
 * @property int $duration
 * @property int $remaining
 * @property \Cake\I18n\FrozenTime $date_next
 * @property string $comment
 * @property int $subscription_status_id
 * @property int $affiliate_id
 * @property int $marketing_id
 * @property string $tracking
 * @property int $language_id
 * @property int $currency_id
 * @property string $ip
 * @property string $forwarded_ip
 * @property string $user_agent
 * @property string $accept_language
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order[] $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\OrderProduct $order_product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\PaymentAddress $payment_address
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ShippingAddress $shipping_address
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product[] $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\SubscriptionPlan $subscription_plan
 * @property \CakePHPOpencart\Model\Entity\Opencart4\SubscriptionStatus $subscription_status
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Affiliate $affiliate
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Marketing $marketing
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Currency $currency
 */
class Subscription extends \CakePHPOpencart\Model\Entity\OpencartCommon\Subscription
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
        'order_product_id' => true,
        'store_id' => true,
        'customer_id' => true,
        'payment_address_id' => true,
        'payment_method' => true,
        'shipping_address_id' => true,
        'shipping_method' => true,
        'product_id' => true,
        'quantity' => true,
        'subscription_plan_id' => true,
        'trial_price' => true,
        'trial_frequency' => true,
        'trial_cycle' => true,
        'trial_duration' => true,
        'trial_remaining' => true,
        'trial_status' => true,
        'price' => true,
        'frequency' => true,
        'cycle' => true,
        'duration' => true,
        'remaining' => true,
        'date_next' => true,
        'comment' => true,
        'subscription_status_id' => true,
        'affiliate_id' => true,
        'marketing_id' => true,
        'tracking' => true,
        'language_id' => true,
        'currency_id' => true,
        'ip' => true,
        'forwarded_ip' => true,
        'user_agent' => true,
        'accept_language' => true,
        'date_added' => true,
        'date_modified' => true,
        'order' => true,
        'order_product' => true,
        'store' => true,
        'customer' => true,
        'payment_address' => true,
        'shipping_address' => true,
        'product' => true,
        'subscription_plan' => true,
        'subscription_status' => true,
        'affiliate' => true,
        'marketing' => true,
        'language' => true,
        'currency' => true,
    ];
}
