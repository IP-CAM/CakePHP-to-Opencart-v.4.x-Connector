<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * BannerImage Entity
 *
 * @property int $banner_image_id
 * @property int $banner_id
 * @property int $language_id
 * @property string $title
 * @property string $link
 * @property string $image
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Banner $banner
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class BannerImage extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractBannerImage
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
        'banner_id' => true,
        'language_id' => true,
        'title' => true,
        'link' => true,
        'image' => true,
        'sort_order' => true,
        'banner' => true,
        'language' => true,
    ];
}
