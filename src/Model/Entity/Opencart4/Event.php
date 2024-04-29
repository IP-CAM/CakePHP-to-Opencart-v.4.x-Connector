<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Event Entity
 *
 * @property int $event_id
 * @property string $code
 * @property string $description
 * @property string $trigger
 * @property string $action
 * @property bool $status
 * @property int $sort_order
 */
class Event extends \CakePHPOpencart\Model\Entity\OpencartCommon\Event
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
        'code' => true,
        'description' => true,
        'trigger' => true,
        'action' => true,
        'status' => true,
        'sort_order' => true,
    ];
}
