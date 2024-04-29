<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Language Entity
 *
 * @property int $language_id
 * @property string $name
 * @property string $code
 * @property string $locale
 * @property string $image
 * @property string $directory
 * @property int $sort_order
 * @property bool $status
 */
class Language extends \CakePHPOpencart\Model\Entity\OpencartCommon\Language
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
        'code' => true,
        'locale' => true,
        'image' => true,
        'directory' => true,
        'sort_order' => true,
        'status' => true,
    ];
}
