<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * SubscriptionStatus Entity
 *
 * @property int $subscription_status_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\SubscriptionStatus $subscription_status
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class SubscriptionStatus extends \CakePHPOpencart\Model\Entity\OpencartCommon\SubscriptionStatus
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
        'name' => true,
        'subscription_status' => true,
        'language' => true,
    ];
}
