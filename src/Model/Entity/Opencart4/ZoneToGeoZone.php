<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ZoneToGeoZone Entity
 *
 * @property int $zone_to_geo_zone_id
 * @property int $country_id
 * @property int $zone_id
 * @property int $geo_zone_id
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Country $country
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Zone $zone
 * @property \CakePHPOpencart\Model\Entity\Opencart4\GeoZone $geo_zone
 */
class ZoneToGeoZone extends \CakePHPOpencart\Model\Entity\OpencartCommon\ZoneToGeoZone
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
        'zone_id' => true,
        'geo_zone_id' => true,
        'date_added' => true,
        'date_modified' => true,
        'country' => true,
        'zone' => true,
        'geo_zone' => true,
    ];
}
