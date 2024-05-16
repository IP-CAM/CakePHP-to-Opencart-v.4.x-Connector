<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * CategoryPath Entity
 *
 * @property int $category_id
 * @property int $path_id
 * @property int $level
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Category $category
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Path $path
 */
class CategoryPath extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCategoryPath
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
        'level' => true,
        'category' => true,
        'path' => true,
    ];
}
