<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * TaxRule Entity
 *
 * @property int $tax_rule_id
 * @property int $tax_class_id
 * @property int $tax_rate_id
 * @property string $based
 * @property int $priority
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\TaxClass $tax_class
 * @property \CakePHPOpencart\Model\Entity\Opencart2\TaxRate $tax_rate
 */
class TaxRule extends \CakePHPOpencart\Model\Entity\OpencartCommon\TaxRule
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
        'tax_class_id' => true,
        'tax_rate_id' => true,
        'based' => true,
        'priority' => true,
        'tax_class' => true,
        'tax_rate' => true,
    ];
}
