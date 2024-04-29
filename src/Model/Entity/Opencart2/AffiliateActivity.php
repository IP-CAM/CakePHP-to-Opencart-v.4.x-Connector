<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * AffiliateActivity Entity
 *
 * @property int $affiliate_activity_id
 * @property int $affiliate_id
 * @property string $key
 * @property string $data
 * @property string $ip
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Affiliate $affiliate
 */
class AffiliateActivity extends \CakePHPOpencart\Model\Entity\OpencartCommon\AffiliateActivity
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
        'affiliate_id' => true,
        'key' => true,
        'data' => true,
        'ip' => true,
        'date_added' => true,
        'affiliate' => true,
    ];
}
