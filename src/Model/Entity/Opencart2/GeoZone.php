<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * GeoZone Entity
 *
 * @property int $geo_zone_id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $date_modified
 * @property \Cake\I18n\FrozenTime $date_added
 */
class GeoZone extends \CakePHPOpencart\Model\Entity\OpencartCommon\GeoZone
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
        'description' => true,
        'date_modified' => true,
        'date_added' => true,
    ];
}
