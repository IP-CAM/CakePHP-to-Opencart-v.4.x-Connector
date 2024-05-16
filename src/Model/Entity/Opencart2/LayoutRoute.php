<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * LayoutRoute Entity
 *
 * @property int $layout_route_id
 * @property int $layout_id
 * @property int $store_id
 * @property string $route
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Layout $layout
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 */
class LayoutRoute extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractLayoutRoute
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
        'layout_id' => true,
        'store_id' => true,
        'route' => true,
        'layout' => true,
        'store' => true,
    ];
}
