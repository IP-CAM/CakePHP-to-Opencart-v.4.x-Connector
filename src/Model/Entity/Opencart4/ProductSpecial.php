<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ProductSpecial Entity
 *
 * @property int $product_special_id
 * @property int $product_id
 * @property int $customer_group_id
 * @property int $priority
 * @property float $price
 * @property \Cake\I18n\FrozenDate $date_start
 * @property \Cake\I18n\FrozenDate $date_end
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomerGroup $customer_group
 */
class ProductSpecial extends \CakePHPOpencart\Model\Entity\OpencartCommon\ProductSpecial
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
        'priority' => true,
        'price' => true,
        'date_start' => true,
        'date_end' => true,
        'product' => true,
        'customer_group' => true,
    ];
}
