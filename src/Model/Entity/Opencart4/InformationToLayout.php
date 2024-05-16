<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * InformationToLayout Entity
 *
 * @property int $information_id
 * @property int $store_id
 * @property int $layout_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Information $information
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Layout $layout
 */
class InformationToLayout extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractInformationToLayout
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
        'information' => true,
        'store' => true,
        'layout' => true,
    ];
}
