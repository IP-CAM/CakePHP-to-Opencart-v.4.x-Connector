<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Coupon Entity
 *
 * @property int $coupon_id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property float $discount
 * @property bool $logged
 * @property bool $shipping
 * @property float $total
 * @property \Cake\I18n\FrozenDate $date_start
 * @property \Cake\I18n\FrozenDate $date_end
 * @property int $uses_total
 * @property int $uses_customer
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Category[] $category
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product[] $product
 */
class Coupon extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCoupon
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
        'name' => true,
        'code' => true,
        'type' => true,
        'discount' => true,
        'logged' => true,
        'shipping' => true,
        'total' => true,
        'date_start' => true,
        'date_end' => true,
        'uses_total' => true,
        'uses_customer' => true,
        'status' => true,
        'date_added' => true,
        'category' => true,
        'product' => true,
    ];
}
