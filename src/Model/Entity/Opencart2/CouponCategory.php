<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * CouponCategory Entity
 *
 * @property int $coupon_id
 * @property int $category_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Coupon $coupon
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Category $category
 */
class CouponCategory extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCouponCategory
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
        'coupon' => true,
        'category' => true,
    ];
}
