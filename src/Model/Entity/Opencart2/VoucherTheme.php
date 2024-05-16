<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * VoucherTheme Entity
 *
 * @property int $voucher_theme_id
 * @property string $image
 */
class VoucherTheme extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractVoucherTheme
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
        'image' => true,
    ];
}
