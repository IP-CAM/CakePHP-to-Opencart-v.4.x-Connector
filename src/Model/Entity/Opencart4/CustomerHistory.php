<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerHistory Entity
 *
 * @property int $customer_history_id
 * @property int $customer_id
 * @property string $comment
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 */
class CustomerHistory extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomerHistory
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
        'comment' => true,
        'date_added' => true,
        'customer' => true,
    ];
}
