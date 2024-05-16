<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * VoucherThemeDescription Entity
 *
 * @property int $voucher_theme_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\VoucherTheme $voucher_theme
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 */
class VoucherThemeDescription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractVoucherThemeDescription
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
        'voucher_theme' => true,
        'language' => true,
    ];
}
