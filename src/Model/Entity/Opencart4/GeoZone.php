<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * GeoZone Entity
 *
 * @property int $geo_zone_id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
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
        'date_added' => true,
        'date_modified' => true,
    ];
}
