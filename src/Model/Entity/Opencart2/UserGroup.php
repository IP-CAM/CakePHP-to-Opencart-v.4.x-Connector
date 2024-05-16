<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * UserGroup Entity
 *
 * @property int $user_group_id
 * @property string $name
 * @property string $permission
 */
class UserGroup extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractUserGroup
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
        'name' => true,
        'permission' => true,
    ];
}
