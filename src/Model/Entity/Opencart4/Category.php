<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Category Entity
 *
 * @property int $category_id
 * @property string $image
 * @property int $parent_id
 * @property bool $top
 * @property int $column
 * @property int $sort_order
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ParentCategory $parent_category
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ChildCategory[] $child_categories
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Filter[] $filter
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Coupon[] $coupon
 */
class Category extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCategory
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
        'image' => true,
        'parent_id' => true,
        'top' => true,
        'column' => true,
        'sort_order' => true,
        'status' => true,
        'date_added' => true,
        'date_modified' => true,
        'parent_category' => true,
        'child_categories' => true,
        'filter' => true,
        'coupon' => true,
    ];
}
