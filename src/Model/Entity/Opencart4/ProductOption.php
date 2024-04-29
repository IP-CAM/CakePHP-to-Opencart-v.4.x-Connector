<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ProductOption Entity
 *
 * @property int $product_option_id
 * @property int $product_id
 * @property int $option_id
 * @property string $value
 * @property bool $required
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Option $option
 */
class ProductOption extends \CakePHPOpencart\Model\Entity\OpencartCommon\ProductOption
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
        'option_id' => true,
        'value' => true,
        'required' => true,
        'product' => true,
        'option' => true,
    ];
}
