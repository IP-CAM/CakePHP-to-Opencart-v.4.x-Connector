<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * FilterGroupDescription Entity
 *
 * @property int $filter_group_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\FilterGroup $filter_group
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class FilterGroupDescription extends \CakePHPOpencart\Model\Entity\OpencartCommon\FilterGroupDescription
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
        'filter_group' => true,
        'language' => true,
    ];
}
