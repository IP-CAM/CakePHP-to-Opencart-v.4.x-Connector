<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomFieldValueDescription Entity
 *
 * @property int $custom_field_value_id
 * @property int $language_id
 * @property int $custom_field_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomFieldValue $custom_field_value
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomField $custom_field
 */
class CustomFieldValueDescription extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomFieldValueDescription
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
        'custom_field_id' => true,
        'name' => true,
        'custom_field_value' => true,
        'language' => true,
        'custom_field' => true,
    ];
}
