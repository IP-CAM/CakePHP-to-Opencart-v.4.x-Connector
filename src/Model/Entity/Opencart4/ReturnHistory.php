<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ReturnHistory Entity
 *
 * @property int $return_history_id
 * @property int $return_id
 * @property int $return_status_id
 * @property bool $notify
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Return $return
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ReturnStatus $return_status
 */
class ReturnHistory extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractReturnHistory
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
        'return_id' => true,
        'return_status_id' => true,
        'notify' => true,
        'comment' => true,
        'date_added' => true,
        'return' => true,
        'return_status' => true,
    ];
}
