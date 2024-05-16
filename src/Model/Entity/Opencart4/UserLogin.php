<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * UserLogin Entity
 *
 * @property int $user_login_id
 * @property int $user_id
 * @property string $ip
 * @property string $user_agent
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\User $user
 */
class UserLogin extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractUserLogin
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
        'ip' => true,
        'user_agent' => true,
        'date_added' => true,
        'user' => true,
    ];
}
