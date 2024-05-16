<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * SeoUrl Entity
 *
 * @property int $seo_url_id
 * @property int $store_id
 * @property int $language_id
 * @property string $key
 * @property string $value
 * @property string $keyword
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class SeoUrl extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractSeoUrl
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
        'store_id' => true,
        'language_id' => true,
        'key' => true,
        'value' => true,
        'keyword' => true,
        'sort_order' => true,
        'store' => true,
        'language' => true,
    ];
}
