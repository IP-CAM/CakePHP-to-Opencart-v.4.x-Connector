<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ApiSession Entity
 *
 * @property int $api_session_id
 * @property int $api_id
 * @property string $token
 * @property string $session_id
 * @property string $session_name
 * @property string $ip
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Api $api
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Session $session
 */
class ApiSession extends \CakePHPOpencart\Model\Entity\OpencartCommon\ApiSession
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
        'api_id' => true,
        'token' => true,
        'session_id' => true,
        'session_name' => true,
        'ip' => true,
        'date_added' => true,
        'date_modified' => true,
        'api' => true,
        'session' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token',
    ];
}
