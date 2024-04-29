<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Setting Entity
 *
 * @property int $setting_id
 * @property int $store_id
 * @property string $code
 * @property string $key
 * @property string $value
 * @property bool $serialized
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 */
class Setting extends \CakePHPOpencart\Model\Entity\OpencartCommon\Setting
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
        'store_id' => true,
        'code' => true,
        'key' => true,
        'value' => true,
        'serialized' => true,
        'store' => true,
    ];
}
