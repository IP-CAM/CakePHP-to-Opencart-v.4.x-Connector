<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * User Entity
 *
 * @property int $user_id
 * @property int $user_group_id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $image
 * @property string $code
 * @property string $ip
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\UserGroup $user_group
 */
class User extends \CakePHPOpencart\Model\Entity\OpencartCommon\User
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
        'user_group_id' => true,
        'username' => true,
        'password' => true,
        'salt' => true,
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'image' => true,
        'code' => true,
        'ip' => true,
        'status' => true,
        'date_added' => true,
        'user_group' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
