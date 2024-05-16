<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * FilterDescription Entity
 *
 * @property int $filter_id
 * @property int $language_id
 * @property int $filter_group_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Filter $filter
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 * @property \CakePHPOpencart\Model\Entity\Opencart4\FilterGroup $filter_group
 */
class FilterDescription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractFilterDescription
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
        'filter_group_id' => true,
        'name' => true,
        'filter' => true,
        'language' => true,
        'filter_group' => true,
    ];
}
