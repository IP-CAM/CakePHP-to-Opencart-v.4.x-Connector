<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ProductReward Entity
 *
 * @property int $product_reward_id
 * @property int $product_id
 * @property int $customer_group_id
 * @property int $points
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomerGroup $customer_group
 */
class ProductReward extends \CakePHPOpencart\Model\Entity\OpencartCommon\ProductReward
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
        'product_id' => true,
        'customer_group_id' => true,
        'points' => true,
        'product' => true,
        'customer_group' => true,
    ];
}
