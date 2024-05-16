<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerApproval Entity
 *
 * @property int $customer_approval_id
 * @property int $customer_id
 * @property string $type
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 */
class CustomerApproval extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCustomerApproval
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
        'type' => true,
        'date_added' => true,
        'customer' => true,
    ];
}
