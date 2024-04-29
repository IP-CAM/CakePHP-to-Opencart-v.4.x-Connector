<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Product Entity
 *
 * @property int $product_id
 * @property int $master_id
 * @property string $model
 * @property string $sku
 * @property string $upc
 * @property string $ean
 * @property string $jan
 * @property string $isbn
 * @property string $mpn
 * @property string $location
 * @property string $variant
 * @property string $override
 * @property int $quantity
 * @property int $stock_status_id
 * @property string $image
 * @property int $manufacturer_id
 * @property bool $shipping
 * @property float $price
 * @property int $points
 * @property int $tax_class_id
 * @property \Cake\I18n\FrozenDate $date_available
 * @property float $weight
 * @property int $weight_class_id
 * @property float $length
 * @property float $width
 * @property float $height
 * @property int $length_class_id
 * @property bool $subtract
 * @property int $minimum
 * @property int $rating
 * @property int $sort_order
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Master $master
 * @property \CakePHPOpencart\Model\Entity\Opencart4\StockStatus $stock_status
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Manufacturer $manufacturer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\TaxClass $tax_class
 * @property \CakePHPOpencart\Model\Entity\Opencart4\WeightClass $weight_class
 * @property \CakePHPOpencart\Model\Entity\Opencart4\LengthClass $length_class
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Coupon[] $coupon
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order[] $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Attribute[] $attribute
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Filter[] $filter
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Option[] $option
 * @property \CakePHPOpencart\Model\Entity\Opencart4\OptionValue[] $option_value
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Subscription[] $subscription
 */
class Product extends \CakePHPOpencart\Model\Entity\OpencartCommon\Product
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
        'master_id' => true,
        'model' => true,
        'sku' => true,
        'upc' => true,
        'ean' => true,
        'jan' => true,
        'isbn' => true,
        'mpn' => true,
        'location' => true,
        'variant' => true,
        'override' => true,
        'quantity' => true,
        'stock_status_id' => true,
        'image' => true,
        'manufacturer_id' => true,
        'shipping' => true,
        'price' => true,
        'points' => true,
        'tax_class_id' => true,
        'date_available' => true,
        'weight' => true,
        'weight_class_id' => true,
        'length' => true,
        'width' => true,
        'height' => true,
        'length_class_id' => true,
        'subtract' => true,
        'minimum' => true,
        'rating' => true,
        'sort_order' => true,
        'status' => true,
        'date_added' => true,
        'date_modified' => true,
        'master' => true,
        'stock_status' => true,
        'manufacturer' => true,
        'tax_class' => true,
        'weight_class' => true,
        'length_class' => true,
        'coupon' => true,
        'order' => true,
        'attribute' => true,
        'filter' => true,
        'option' => true,
        'option_value' => true,
        'subscription' => true,
    ];
}
