<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * AffiliateLogin Entity
 *
 * @property int $affiliate_login_id
 * @property string $email
 * @property string $ip
 * @property int $total
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 */
class AffiliateLogin extends \CakePHPOpencart\Model\Entity\OpencartCommon\AffiliateLogin
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
        'email' => true,
        'ip' => true,
        'total' => true,
        'date_added' => true,
        'date_modified' => true,
    ];
}
