<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CategoryFilter Entity
 *
 * @property int $category_id
 * @property int $filter_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Category $category
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Filter $filter
 */
class CategoryFilter extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCategoryFilter
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
        'category' => true,
        'filter' => true,
    ];
}
