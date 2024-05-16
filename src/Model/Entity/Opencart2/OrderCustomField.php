<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OrderCustomField Entity
 *
 * @property int $order_custom_field_id
 * @property int $order_id
 * @property int $custom_field_id
 * @property int $custom_field_value_id
 * @property string $name
 * @property string $value
 * @property string $type
 * @property string $location
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomField $custom_field
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomFieldValue $custom_field_value
 */
class OrderCustomField extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractOrderCustomField
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
        'custom_field_id' => true,
        'custom_field_value_id' => true,
        'name' => true,
        'value' => true,
        'type' => true,
        'location' => true,
        'order' => true,
        'custom_field' => true,
        'custom_field_value' => true,
    ];
}
