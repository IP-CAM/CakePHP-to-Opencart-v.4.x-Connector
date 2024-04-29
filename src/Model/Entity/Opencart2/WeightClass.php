<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * WeightClass Entity
 *
 * @property int $weight_class_id
 * @property float $value
 */
class WeightClass extends \CakePHPOpencart\Model\Entity\OpencartCommon\WeightClass
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
        'value' => true,
    ];
}
