<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Theme Entity
 *
 * @property int $theme_id
 * @property int $store_id
 * @property string $route
 * @property string $code
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Voucher[] $voucher
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
        'route' => true,
        'code' => true,
        'date_added' => true,
        'store' => true,
        'voucher' => true,
    ];
}
