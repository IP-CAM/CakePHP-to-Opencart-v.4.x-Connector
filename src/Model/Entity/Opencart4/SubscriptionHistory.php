<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * SubscriptionHistory Entity
 *
 * @property int $subscription_history_id
 * @property int $subscription_id
 * @property int $subscription_status_id
 * @property bool $notify
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Subscription $subscription
 * @property \CakePHPOpencart\Model\Entity\Opencart4\SubscriptionStatus $subscription_status
 */
class SubscriptionHistory extends \CakePHPOpencart\Model\Entity\OpencartCommon\SubscriptionHistory
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
        'subscription_id' => true,
        'subscription_status_id' => true,
        'notify' => true,
        'comment' => true,
        'date_added' => true,
        'subscription' => true,
        'subscription_status' => true,
    ];
}
