<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * CustomerGroup Entity
 *
 * @property int $customer_group_id
 * @property int $approval
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomField[] $custom_field
 */
class CustomerGroup extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomerGroup
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
        'approval' => true,
        'sort_order' => true,
        'custom_field' => true,
    ];
}
