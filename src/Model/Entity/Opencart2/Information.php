<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Information Entity
 *
 * @property int $information_id
 * @property int $bottom
 * @property int $sort_order
 * @property bool $status
 */
class Information extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractInformation
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
        'bottom' => true,
        'sort_order' => true,
        'status' => true,
    ];
}
