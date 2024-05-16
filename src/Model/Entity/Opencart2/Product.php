<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Product Entity
 *
 * @property int $product_id
 * @property string $model
 * @property string $sku
 * @property string $upc
 * @property string $ean
 * @property string $jan
 * @property string $isbn
 * @property string $mpn
 * @property string $location
 * @property int $quantity
 * @property int $stock_status_id
 * @property string|null $image
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
 * @property int $sort_order
 * @property bool $status
 * @property int $viewed
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\StockStatus $stock_status
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Manufacturer $manufacturer
 * @property \CakePHPOpencart\Model\Entity\Opencart2\TaxClass $tax_class
 * @property \CakePHPOpencart\Model\Entity\Opencart2\WeightClass $weight_class
 * @property \CakePHPOpencart\Model\Entity\Opencart2\LengthClass $length_class
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Coupon[] $coupon
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order[] $order
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Attribute[] $attribute
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Filter[] $filter
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Option[] $option
 * @property \CakePHPOpencart\Model\Entity\Opencart2\OptionValue[] $option_value
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Recurring[] $recurring
 */
class Product extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractProduct
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
        'model' => true,
        'sku' => true,
        'upc' => true,
        'ean' => true,
        'jan' => true,
        'isbn' => true,
        'mpn' => true,
        'location' => true,
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
        'sort_order' => true,
        'status' => true,
        'viewed' => true,
        'date_added' => true,
        'date_modified' => true,
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
        'recurring' => true,
    ];
}
