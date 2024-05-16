<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * OrderVoucher Entity
 *
 * @property int $order_voucher_id
 * @property int $order_id
 * @property int $voucher_id
 * @property string $description
 * @property string $code
 * @property string $from_name
 * @property string $from_email
 * @property string $to_name
 * @property string $to_email
 * @property int $voucher_theme_id
 * @property string $message
 * @property float $amount
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Voucher $voucher
 * @property \CakePHPOpencart\Model\Entity\Opencart4\VoucherTheme $voucher_theme
 */
class OrderVoucher extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractOrderVoucher
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
        'voucher_id' => true,
        'description' => true,
        'code' => true,
        'from_name' => true,
        'from_email' => true,
        'to_name' => true,
        'to_email' => true,
        'voucher_theme_id' => true,
        'message' => true,
        'amount' => true,
        'order' => true,
        'voucher' => true,
        'voucher_theme' => true,
    ];
}
