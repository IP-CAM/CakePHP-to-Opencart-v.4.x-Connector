<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Startup Entity
 *
 * @property int $startup_id
 * @property string $code
 * @property string $action
 * @property bool $status
 * @property int $sort_order
 */
class Startup extends \CakePHPOpencart\Model\Entity\OpencartCommon\Startup
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
        'code' => true,
        'action' => true,
        'status' => true,
        'sort_order' => true,
    ];
}
