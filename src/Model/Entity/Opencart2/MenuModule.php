<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * MenuModule Entity
 *
 * @property int $menu_module_id
 * @property int $menu_id
 * @property string $code
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Menu $menu
 */
class MenuModule extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractMenuModule
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
        'menu_id' => true,
        'code' => true,
        'sort_order' => true,
        'menu' => true,
    ];
}
