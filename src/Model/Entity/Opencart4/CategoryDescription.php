<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CategoryDescription Entity
 *
 * @property int $category_id
 * @property int $language_id
 * @property string $name
 * @property string $description
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Category $category
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class CategoryDescription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCategoryDescription
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
        'description' => true,
        'meta_title' => true,
        'meta_description' => true,
        'meta_keyword' => true,
        'category' => true,
        'language' => true,
    ];
}
