<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * OptionValueDescription Entity
 *
 * @property int $option_value_id
 * @property int $language_id
 * @property int $option_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\OptionValue $option_value
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Option $option
 */
class OptionValueDescription extends \CakePHPOpencart\Model\Entity\OpencartCommon\OptionValueDescription
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
        'option_id' => true,
        'name' => true,
        'option_value' => true,
        'language' => true,
        'option' => true,
    ];
}
