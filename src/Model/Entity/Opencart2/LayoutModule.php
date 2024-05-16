<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * LayoutModule Entity
 *
 * @property int $layout_module_id
 * @property int $layout_id
 * @property string $code
 * @property string $position
 * @property int $sort_order
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Layout $layout
 */
class LayoutModule extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractLayoutModule
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
        'code' => true,
        'position' => true,
        'sort_order' => true,
        'layout' => true,
    ];
}
