<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerActivity Entity
 *
 * @property int $customer_activity_id
 * @property int $customer_id
 * @property string $key
 * @property string $data
 * @property string $ip
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 */
class CustomerActivity extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCustomerActivity
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
        'key' => true,
        'data' => true,
        'ip' => true,
        'date_added' => true,
        'customer' => true,
    ];
}
