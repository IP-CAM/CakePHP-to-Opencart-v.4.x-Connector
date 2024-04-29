<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Menu Entity
 *
 * @property int $menu_id
 * @property int $store_id
 * @property string $type
 * @property string $link
 * @property int $sort_order
 * @property bool $status
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Module[] $module
 */
class Menu extends \CakePHPOpencart\Model\Entity\OpencartCommon\Menu
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
        'type' => true,
        'link' => true,
        'sort_order' => true,
        'status' => true,
        'store' => true,
        'module' => true,
    ];
}
