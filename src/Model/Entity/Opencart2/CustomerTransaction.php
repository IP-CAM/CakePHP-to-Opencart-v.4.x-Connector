<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * CustomerTransaction Entity
 *
 * @property int $customer_transaction_id
 * @property int $customer_id
 * @property int $order_id
 * @property string $description
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order $order
 */
class CustomerTransaction extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCustomerTransaction
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
        'customer_id' => true,
        'order_id' => true,
        'description' => true,
        'amount' => true,
        'date_added' => true,
        'customer' => true,
        'order' => true,
    ];
}
