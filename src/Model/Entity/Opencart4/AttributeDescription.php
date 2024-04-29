<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * AttributeDescription Entity
 *
 * @property int $attribute_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Attribute $attribute
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class AttributeDescription extends \CakePHPOpencart\Model\Entity\OpencartCommon\AttributeDescription
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
        'name' => true,
        'attribute' => true,
        'language' => true,
    ];
}
