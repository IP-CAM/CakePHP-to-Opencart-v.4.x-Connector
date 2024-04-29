<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Module Entity
 *
 * @property int $module_id
 * @property string $name
 * @property string $code
 * @property string $setting
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Layout[] $layout
 */
class Module extends \CakePHPOpencart\Model\Entity\OpencartCommon\Module
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
        'setting' => true,
        'layout' => true,
    ];
}
