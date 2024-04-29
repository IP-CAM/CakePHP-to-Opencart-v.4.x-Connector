<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ProductOptionValue Entity
 *
 * @property int $product_option_value_id
 * @property int $product_option_id
 * @property int $product_id
 * @property int $option_id
 * @property int $option_value_id
 * @property int $quantity
 * @property bool $subtract
 * @property float $price
 * @property string $price_prefix
 * @property int $points
 * @property string $points_prefix
 * @property float $weight
 * @property string $weight_prefix
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ProductOption $product_option
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Option $option
 * @property \CakePHPOpencart\Model\Entity\Opencart4\OptionValue $option_value
 */
class ProductOptionValue extends \CakePHPOpencart\Model\Entity\OpencartCommon\ProductOptionValue
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
        'product_option_id' => true,
        'product_id' => true,
        'option_id' => true,
        'option_value_id' => true,
        'quantity' => true,
        'subtract' => true,
        'price' => true,
        'price_prefix' => true,
        'points' => true,
        'points_prefix' => true,
        'weight' => true,
        'weight_prefix' => true,
        'product_option' => true,
        'product' => true,
        'option' => true,
        'option_value' => true,
    ];
}
