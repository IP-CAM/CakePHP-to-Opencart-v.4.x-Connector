<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * WeightClassDescription Entity
 *
 * @property int $weight_class_id
 * @property int $language_id
 * @property string $title
 * @property string $unit
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\WeightClass $weight_class
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 */
class WeightClassDescription extends \CakePHPOpencart\Model\Entity\OpencartCommon\WeightClassDescription
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
        'unit' => true,
        'weight_class' => true,
        'language' => true,
    ];
}
