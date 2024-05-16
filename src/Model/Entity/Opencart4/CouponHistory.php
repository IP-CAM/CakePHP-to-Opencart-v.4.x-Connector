<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CouponHistory Entity
 *
 * @property int $coupon_history_id
 * @property int $coupon_id
 * @property int $order_id
 * @property int $customer_id
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Coupon $coupon
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 */
class CouponHistory extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCouponHistory
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
        'coupon_id' => true,
        'order_id' => true,
        'customer_id' => true,
        'amount' => true,
        'date_added' => true,
        'coupon' => true,
        'order' => true,
        'customer' => true,
    ];
}
