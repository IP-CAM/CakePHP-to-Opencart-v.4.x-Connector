<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ProductRecurring Entity
 *
 * @property int $product_id
 * @property int $recurring_id
 * @property int $customer_group_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Recurring $recurring
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomerGroup $customer_group
 */
class ProductRecurring extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractProductRecurring
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
        'product' => true,
        'recurring' => true,
        'customer_group' => true,
    ];
}
