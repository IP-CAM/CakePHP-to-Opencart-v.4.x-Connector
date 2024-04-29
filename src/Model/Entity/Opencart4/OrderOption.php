<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * OrderOption Entity
 *
 * @property int $order_option_id
 * @property int $order_id
 * @property int $order_product_id
 * @property int $product_option_id
 * @property int $product_option_value_id
 * @property string $name
 * @property string $value
 * @property string $type
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\OrderProduct $order_product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ProductOption $product_option
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ProductOptionValue $product_option_value
 */
class OrderOption extends \CakePHPOpencart\Model\Entity\OpencartCommon\OrderOption
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
        'product_option_id' => true,
        'product_option_value_id' => true,
        'name' => true,
        'value' => true,
        'type' => true,
        'order' => true,
        'order_product' => true,
        'product_option' => true,
        'product_option_value' => true,
    ];
}
