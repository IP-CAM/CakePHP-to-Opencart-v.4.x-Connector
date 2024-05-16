<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Api Entity
 *
 * @property int $api_id
 * @property string $username
 * @property string $key
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Session[] $session
 */
class Api extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractApi
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
        'username' => true,
        'key' => true,
        'status' => true,
        'date_added' => true,
        'date_modified' => true,
        'session' => true,
    ];
}
