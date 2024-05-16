<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Event Entity
 *
 * @property int $event_id
 * @property string $code
 * @property string $trigger
 * @property string $action
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 */
class Event extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractEvent
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
        'trigger' => true,
        'action' => true,
        'status' => true,
        'date_added' => true,
    ];
}
