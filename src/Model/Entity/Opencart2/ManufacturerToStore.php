<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ManufacturerToStore Entity
 *
 * @property int $manufacturer_id
 * @property int $store_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Manufacturer $manufacturer
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 */
class ManufacturerToStore extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractManufacturerToStore
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
        'manufacturer' => true,
        'store' => true,
    ];
}
