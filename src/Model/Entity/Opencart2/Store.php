<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Store Entity
 *
 * @property int $store_id
 * @property string $name
 * @property string $url
 * @property string $ssl
 */
class Store extends \CakePHPOpencart\Model\Entity\OpencartCommon\Store
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
        'url' => true,
        'ssl' => true,
    ];
}
