<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Cart Entity
 *
 * @property int $cart_id
 * @property int $api_id
 * @property int $customer_id
 * @property string $session_id
 * @property int $product_id
 * @property int $recurring_id
 * @property string $option
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Api $api
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Session $session
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Recurring $recurring
 */
class Cart extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCart
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
        'api_id' => true,
        'customer_id' => true,
        'session_id' => true,
        'product_id' => true,
        'recurring_id' => true,
        'option' => true,
        'quantity' => true,
        'date_added' => true,
        'api' => true,
        'customer' => true,
        'session' => true,
        'product' => true,
        'recurring' => true,
    ];
}
