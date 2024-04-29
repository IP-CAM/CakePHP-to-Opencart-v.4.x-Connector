<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Session Entity
 *
 * @property string $session_id
 * @property string $data
 * @property \Cake\I18n\FrozenTime $expire
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Api[] $api
 */
class Session extends \CakePHPOpencart\Model\Entity\OpencartCommon\Session
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
        'data' => true,
        'expire' => true,
        'api' => true,
    ];
}
