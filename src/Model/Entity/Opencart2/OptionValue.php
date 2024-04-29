<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OptionValue Entity
 *
 * @property int $option_value_id
 * @property int $option_id
 * @property string $image
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Option $option
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product[] $product
 */
class OptionValue extends \CakePHPOpencart\Model\Entity\OpencartCommon\OptionValue
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
        'option_id' => true,
        'image' => true,
        'sort_order' => true,
        'option' => true,
        'product' => true,
    ];
}
