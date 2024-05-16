<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OrderRecurringTransaction Entity
 *
 * @property int $order_recurring_transaction_id
 * @property int $order_recurring_id
 * @property string $reference
 * @property string $type
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\OrderRecurring $order_recurring
 */
class OrderRecurringTransaction extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractOrderRecurringTransaction
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
        'order_recurring_id' => true,
        'reference' => true,
        'type' => true,
        'amount' => true,
        'date_added' => true,
        'order_recurring' => true,
    ];
}
