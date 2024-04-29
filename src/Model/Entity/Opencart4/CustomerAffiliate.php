<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerAffiliate Entity
 *
 * @property int $customer_id
 * @property string $company
 * @property string $website
 * @property string $tracking
 * @property float $balance
 * @property float $commission
 * @property string $tax
 * @property string $payment_method
 * @property string $cheque
 * @property string $paypal
 * @property string $bank_name
 * @property string $bank_branch_number
 * @property string $bank_swift_code
 * @property string $bank_account_name
 * @property string $bank_account_number
 * @property string $custom_field
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 */
class CustomerAffiliate extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomerAffiliate
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
        'company' => true,
        'website' => true,
        'tracking' => true,
        'balance' => true,
        'commission' => true,
        'tax' => true,
        'payment_method' => true,
        'cheque' => true,
        'paypal' => true,
        'bank_name' => true,
        'bank_branch_number' => true,
        'bank_swift_code' => true,
        'bank_account_name' => true,
        'bank_account_number' => true,
        'custom_field' => true,
        'status' => true,
        'date_added' => true,
    ];
}
