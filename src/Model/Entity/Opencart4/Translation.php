<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Translation Entity
 *
 * @property int $translation_id
 * @property int $store_id
 * @property int $language_id
 * @property string $route
 * @property string $key
 * @property string $value
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class Translation extends \CakePHPOpencart\Model\Entity\OpencartCommon\Translation
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
        'route' => true,
        'key' => true,
        'value' => true,
        'date_added' => true,
        'store' => true,
        'language' => true,
    ];
}
