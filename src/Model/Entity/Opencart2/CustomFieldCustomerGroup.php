<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * CustomFieldCustomerGroup Entity
 *
 * @property int $custom_field_id
 * @property int $customer_group_id
 * @property bool $required
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomField $custom_field
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomerGroup $customer_group
 */
class CustomFieldCustomerGroup extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomFieldCustomerGroup
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
        'required' => true,
        'custom_field' => true,
        'customer_group' => true,
    ];
}
