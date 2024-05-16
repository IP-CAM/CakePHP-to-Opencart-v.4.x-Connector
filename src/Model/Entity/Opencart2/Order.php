<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Order Entity
 *
 * @property int $order_id
 * @property int $invoice_no
 * @property string $invoice_prefix
 * @property int $store_id
 * @property string $store_name
 * @property string $store_url
 * @property int $customer_id
 * @property int $customer_group_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $payment_firstname
 * @property string $payment_lastname
 * @property string $payment_company
 * @property string $payment_address_1
 * @property string $payment_address_2
 * @property string $payment_city
 * @property string $payment_postcode
 * @property int $payment_country_id
 * @property int $payment_zone_id
 * @property string $payment_address_format
 * @property string $payment_custom_field
 * @property string $payment_method
 * @property string $payment_code
 * @property string $shipping_firstname
 * @property string $shipping_lastname
 * @property string $shipping_company
 * @property string $shipping_address_1
 * @property string $shipping_address_2
 * @property string $shipping_city
 * @property string $shipping_postcode
 * @property int $shipping_country_id
 * @property int $shipping_zone_id
 * @property string $shipping_address_format
 * @property string $shipping_custom_field
 * @property string $shipping_method
 * @property string $shipping_code
 * @property string $comment
 * @property float $total
 * @property int $order_status_id
 * @property int $affiliate_id
 * @property float $commission
 * @property int $marketing_id
 * @property string $tracking
 * @property int $language_id
 * @property int $currency_id
 * @property string $currency_code
 * @property float $currency_value
 * @property string $ip
 * @property string $forwarded_ip
 * @property string $user_agent
 * @property string $accept_language
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomField[] $custom_field
 * @property \CakePHPOpencart\Model\Entity\Opencart2\PaymentCountry $payment_country
 * @property \CakePHPOpencart\Model\Entity\Opencart2\PaymentZone $payment_zone
 * @property \CakePHPOpencart\Model\Entity\Opencart2\ShippingCountry $shipping_country
 * @property \CakePHPOpencart\Model\Entity\Opencart2\ShippingZone $shipping_zone
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomerGroup $customer_group
 * @property \CakePHPOpencart\Model\Entity\Opencart2\OrderStatus $order_status
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Affiliate $affiliate
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Marketing $marketing
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Currency $currency
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Option[] $option
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product[] $product
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Recurring[] $recurring
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Voucher[] $voucher
 */
class Order extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractOrder
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
        'invoice_no' => true,
        'invoice_prefix' => true,
        'store_id' => true,
        'store_name' => true,
        'store_url' => true,
        'customer_id' => true,
        'customer_group_id' => true,
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'telephone' => true,
        'fax' => true,
        'custom_field' => true,
        'payment_firstname' => true,
        'payment_lastname' => true,
        'payment_company' => true,
        'payment_address_1' => true,
        'payment_address_2' => true,
        'payment_city' => true,
        'payment_postcode' => true,
        'payment_country' => true,
        'payment_country_id' => true,
        'payment_zone' => true,
        'payment_zone_id' => true,
        'payment_address_format' => true,
        'payment_custom_field' => true,
        'payment_method' => true,
        'payment_code' => true,
        'shipping_firstname' => true,
        'shipping_lastname' => true,
        'shipping_company' => true,
        'shipping_address_1' => true,
        'shipping_address_2' => true,
        'shipping_city' => true,
        'shipping_postcode' => true,
        'shipping_country' => true,
        'shipping_country_id' => true,
        'shipping_zone' => true,
        'shipping_zone_id' => true,
        'shipping_address_format' => true,
        'shipping_custom_field' => true,
        'shipping_method' => true,
        'shipping_code' => true,
        'comment' => true,
        'total' => true,
        'order_status_id' => true,
        'affiliate_id' => true,
        'commission' => true,
        'marketing_id' => true,
        'tracking' => true,
        'language_id' => true,
        'currency_id' => true,
        'currency_code' => true,
        'currency_value' => true,
        'ip' => true,
        'forwarded_ip' => true,
        'user_agent' => true,
        'accept_language' => true,
        'date_added' => true,
        'date_modified' => true,
        'store' => true,
        'customer' => true,
        'customer_group' => true,
        'order_status' => true,
        'affiliate' => true,
        'marketing' => true,
        'language' => true,
        'currency' => true,
        'option' => true,
        'product' => true,
        'recurring' => true,
        'voucher' => true,
    ];
}
