<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * TaxClass Entity
 *
 * @property int $tax_class_id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 */
class TaxClass extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractTaxClass
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
        'title' => true,
        'description' => true,
        'date_added' => true,
        'date_modified' => true,
    ];
}
