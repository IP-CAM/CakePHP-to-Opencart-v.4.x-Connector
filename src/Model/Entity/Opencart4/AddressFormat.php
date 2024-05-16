<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * AddressFormat Entity
 *
 * @property int $address_format_id
 * @property string $name
 * @property string $address_format
 */
class AddressFormat extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractAddressFormat
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
        'name' => true,
        'address_format' => true,
    ];
}
