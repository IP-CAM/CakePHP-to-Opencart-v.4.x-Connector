<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Location Entity
 *
 * @property int $location_id
 * @property string $name
 * @property string $address
 * @property string $telephone
 * @property string $geocode
 * @property string $image
 * @property string $open
 * @property string $comment
 */
class Location extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractLocation
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
        'address' => true,
        'telephone' => true,
        'geocode' => true,
        'image' => true,
        'open' => true,
        'comment' => true,
    ];
}
