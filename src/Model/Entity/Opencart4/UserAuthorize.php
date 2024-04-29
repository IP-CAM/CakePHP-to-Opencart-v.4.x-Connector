<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * UserAuthorize Entity
 *
 * @property int $user_authorize_id
 * @property int $user_id
 * @property string $token
 * @property int $total
 * @property string $ip
 * @property string $user_agent
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\User $user
 */
class UserAuthorize extends \CakePHPOpencart\Model\Entity\OpencartCommon\UserAuthorize
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
        'user_id' => true,
        'token' => true,
        'total' => true,
        'ip' => true,
        'user_agent' => true,
        'status' => true,
        'date_added' => true,
        'user' => true,
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
