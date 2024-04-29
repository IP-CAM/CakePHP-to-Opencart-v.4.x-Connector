<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * MarketingReport Entity
 *
 * @property int $marketing_report_id
 * @property int $marketing_id
 * @property int $store_id
 * @property string $ip
 * @property string $country
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Marketing $marketing
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 */
class MarketingReport extends \CakePHPOpencart\Model\Entity\OpencartCommon\MarketingReport
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
        'marketing_id' => true,
        'store_id' => true,
        'ip' => true,
        'country' => true,
        'date_added' => true,
        'marketing' => true,
        'store' => true,
    ];
}
