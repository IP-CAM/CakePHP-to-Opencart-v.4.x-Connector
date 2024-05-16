<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * LengthClassDescription Entity
 *
 * @property int $length_class_id
 * @property int $language_id
 * @property string $title
 * @property string $unit
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\LengthClass $length_class
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 */
class LengthClassDescription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractLengthClassDescription
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
        'length_class' => true,
        'language' => true,
    ];
}
