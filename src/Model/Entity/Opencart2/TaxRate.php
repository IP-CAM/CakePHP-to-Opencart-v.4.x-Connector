<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * TaxRate Entity
 *
 * @property int $tax_rate_id
 * @property int $geo_zone_id
 * @property string $name
 * @property float $rate
 * @property string $type
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\GeoZone $geo_zone
 */
class TaxRate extends \CakePHPOpencart\Model\Entity\OpencartCommon\TaxRate
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
        'geo_zone_id' => true,
        'name' => true,
        'rate' => true,
        'type' => true,
        'date_added' => true,
        'date_modified' => true,
        'geo_zone' => true,
    ];
}
