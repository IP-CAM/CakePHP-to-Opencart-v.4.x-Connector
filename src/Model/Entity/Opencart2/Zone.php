<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Zone Entity
 *
 * @property int $zone_id
 * @property int $country_id
 * @property string $name
 * @property string $code
 * @property bool $status
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Country $country
 */
class Zone extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractZone
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
        'country_id' => true,
        'name' => true,
        'code' => true,
        'status' => true,
        'country' => true,
    ];
}
