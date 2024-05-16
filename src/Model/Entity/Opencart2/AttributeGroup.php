<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * AttributeGroup Entity
 *
 * @property int $attribute_group_id
 * @property int $sort_order
 */
class AttributeGroup extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractAttributeGroup
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
        'sort_order' => true,
    ];
}
