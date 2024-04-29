<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OrderProduct Entity
 *
 * @property int $order_product_id
 * @property int $order_id
 * @property int $product_id
 * @property string $name
 * @property string $model
 * @property int $quantity
 * @property float $price
 * @property float $total
 * @property float $tax
 * @property int $reward
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 */
class OrderProduct extends \CakePHPOpencart\Model\Entity\OpencartCommon\OrderProduct
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
        'product_id' => true,
        'name' => true,
        'model' => true,
        'quantity' => true,
        'price' => true,
        'total' => true,
        'tax' => true,
        'reward' => true,
        'order' => true,
        'product' => true,
    ];
}
