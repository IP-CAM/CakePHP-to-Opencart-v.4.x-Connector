<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Cron Entity
 *
 * @property int $cron_id
 * @property string $code
 * @property string $description
 * @property string $cycle
 * @property string $action
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 */
class Cron extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCron
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
        'cycle' => true,
        'action' => true,
        'status' => true,
        'date_added' => true,
        'date_modified' => true,
    ];
}
