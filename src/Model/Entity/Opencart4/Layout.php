<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Layout Entity
 *
 * @property int $layout_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Module[] $module
 */
class Layout extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractLayout
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
        'module' => true,
    ];
}
