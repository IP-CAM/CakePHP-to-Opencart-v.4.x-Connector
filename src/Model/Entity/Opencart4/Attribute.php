<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Attribute Entity
 *
 * @property int $attribute_id
 * @property int $attribute_group_id
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\AttributeGroup $attribute_group
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product[] $product
 */
class Attribute extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractAttribute
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
        'attribute_group_id' => true,
        'sort_order' => true,
        'attribute_group' => true,
        'product' => true,
    ];
}
