<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomFieldValue Entity
 *
 * @property int $custom_field_value_id
 * @property int $custom_field_id
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomField $custom_field
 */
class CustomFieldValue extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCustomFieldValue
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
        'custom_field_id' => true,
        'sort_order' => true,
        'custom_field' => true,
    ];
}
