<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerReward Entity
 *
 * @property int $customer_reward_id
 * @property int $customer_id
 * @property int $order_id
 * @property string $description
 * @property int $points
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 */
class CustomerReward extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomerReward
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
        'points' => true,
        'date_added' => true,
        'customer' => true,
        'order' => true,
    ];
}
