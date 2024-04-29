<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Theme Entity
 *
 * @property int $theme_id
 * @property int $store_id
 * @property string $theme
 * @property string $route
 * @property string $code
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Voucher[] $voucher
 */
class Theme extends \CakePHPOpencart\Model\Entity\OpencartCommon\Theme
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
        'theme' => true,
        'route' => true,
        'code' => true,
        'store' => true,
        'voucher' => true,
    ];
}
