<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Manufacturer Entity
 *
 * @property int $manufacturer_id
 * @property string $name
 * @property string $image
 * @property int $sort_order
 */
class Manufacturer extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractManufacturer
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
        'image' => true,
        'sort_order' => true,
    ];
}
