<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * CustomField Entity
 *
 * @property int $custom_field_id
 * @property string $type
 * @property string $value
 * @property string $validation
 * @property string $location
 * @property bool $status
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomerGroup[] $customer_group
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order[] $order
 */
class CustomField extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCustomField
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
        'type' => true,
        'value' => true,
        'validation' => true,
        'location' => true,
        'status' => true,
        'sort_order' => true,
        'customer_group' => true,
        'order' => true,
    ];
}
