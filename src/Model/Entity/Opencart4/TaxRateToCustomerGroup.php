<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * TaxRateToCustomerGroup Entity
 *
 * @property int $tax_rate_id
 * @property int $customer_group_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\TaxRate $tax_rate
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomerGroup $customer_group
 */
class TaxRateToCustomerGroup extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractTaxRateToCustomerGroup
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
        'tax_rate' => true,
        'customer_group' => true,
    ];
}
