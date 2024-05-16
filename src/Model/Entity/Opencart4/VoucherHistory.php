<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * VoucherHistory Entity
 *
 * @property int $voucher_history_id
 * @property int $voucher_id
 * @property int $order_id
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Voucher $voucher
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 */
class VoucherHistory extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractVoucherHistory
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
        'voucher_id' => true,
        'order_id' => true,
        'amount' => true,
        'date_added' => true,
        'voucher' => true,
        'order' => true,
    ];
}
