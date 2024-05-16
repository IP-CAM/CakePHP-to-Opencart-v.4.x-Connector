<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CouponProduct Entity
 *
 * @property int $coupon_product_id
 * @property int $coupon_id
 * @property int $product_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Coupon $coupon
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 */
class CouponProduct extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCouponProduct
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
        'product_id' => true,
        'coupon' => true,
        'product' => true,
    ];
}
