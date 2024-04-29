<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Notification Entity
 *
 * @property int $notification_id
 * @property string $title
 * @property string $text
 * @property int $status
 * @property \Cake\I18n\FrozenTime $date_added
 */
class Notification extends \CakePHPOpencart\Model\Entity\OpencartCommon\Notification
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
        'title' => true,
        'text' => true,
        'status' => true,
        'date_added' => true,
    ];
}
