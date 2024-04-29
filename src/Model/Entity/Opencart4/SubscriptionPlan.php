<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * SubscriptionPlan Entity
 *
 * @property int $subscription_plan_id
 * @property string $trial_frequency
 * @property int $trial_duration
 * @property int $trial_cycle
 * @property int $trial_status
 * @property string $frequency
 * @property int $duration
 * @property int $cycle
 * @property bool $status
 * @property int $sort_order
 */
class SubscriptionPlan extends \CakePHPOpencart\Model\Entity\OpencartCommon\SubscriptionPlan
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
        'trial_frequency' => true,
        'trial_duration' => true,
        'trial_cycle' => true,
        'trial_status' => true,
        'frequency' => true,
        'duration' => true,
        'cycle' => true,
        'status' => true,
        'sort_order' => true,
    ];
}
