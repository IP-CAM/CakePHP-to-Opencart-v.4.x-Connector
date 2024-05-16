<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * AffiliateTransaction Entity
 *
 * @property int $affiliate_transaction_id
 * @property int $affiliate_id
 * @property int $order_id
 * @property string $description
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Affiliate $affiliate
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Order $order
 */
class AffiliateTransaction extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractAffiliateTransaction
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
        'affiliate_id' => true,
        'order_id' => true,
        'description' => true,
        'amount' => true,
        'date_added' => true,
        'affiliate' => true,
        'order' => true,
    ];
}
