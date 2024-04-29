<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerAffiliateReport Entity
 *
 * @property int $customer_affiliate_report_id
 * @property int $customer_id
 * @property int $store_id
 * @property string $ip
 * @property string $country
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 */
class CustomerAffiliateReport extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomerAffiliateReport
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
        'customer_id' => true,
        'store_id' => true,
        'ip' => true,
        'country' => true,
        'date_added' => true,
        'customer' => true,
        'store' => true,
    ];
}
