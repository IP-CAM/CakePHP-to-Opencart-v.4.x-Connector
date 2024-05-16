<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Voucher Entity
 *
 * @property int $voucher_id
 * @property int $order_id
 * @property string $code
 * @property string $from_name
 * @property string $from_email
 * @property string $to_name
 * @property string $to_email
 * @property int $voucher_theme_id
 * @property string $message
 * @property float $amount
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order[] $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\VoucherTheme $voucher_theme
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Theme[] $theme
 */
class Voucher extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractVoucher
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
        'order_id' => true,
        'code' => true,
        'from_name' => true,
        'from_email' => true,
        'to_name' => true,
        'to_email' => true,
        'voucher_theme_id' => true,
        'message' => true,
        'amount' => true,
        'status' => true,
        'date_added' => true,
        'order' => true,
        'voucher_theme' => true,
        'theme' => true,
    ];
}
