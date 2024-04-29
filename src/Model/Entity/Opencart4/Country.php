<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Country Entity
 *
 * @property int $country_id
 * @property string $name
 * @property string $iso_code_2
 * @property string $iso_code_3
 * @property int $address_format_id
 * @property bool $postcode_required
 * @property bool $status
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\AddressFormat $address_format
 */
class Country extends \CakePHPOpencart\Model\Entity\OpencartCommon\Country
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
        'iso_code_2' => true,
        'iso_code_3' => true,
        'address_format_id' => true,
        'postcode_required' => true,
        'status' => true,
        'address_format' => true,
    ];
}
