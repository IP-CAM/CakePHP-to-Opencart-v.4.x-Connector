<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Address Entity
 *
 * @property int $address_id
 * @property int $customer_id
 * @property string $firstname
 * @property string $lastname
 * @property string $company
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $postcode
 * @property int $country_id
 * @property int $zone_id
 * @property string $custom_field
 * @property bool $default
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Country $country
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Zone $zone
 */
class Address extends \CakePHPOpencart\Model\Entity\OpencartCommon\Address
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
        'customer_id' => true,
        'firstname' => true,
        'lastname' => true,
        'company' => true,
        'address_1' => true,
        'address_2' => true,
        'city' => true,
        'postcode' => true,
        'country_id' => true,
        'zone_id' => true,
        'custom_field' => true,
        'default' => true,
        'customer' => true,
        'country' => true,
        'zone' => true,
    ];
}
