<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Banner Entity
 *
 * @property int $banner_id
 * @property string $name
 * @property bool $status
 */
class Banner extends \CakePHPOpencart\Model\Entity\OpencartCommon\Banner
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
        'status' => true,
    ];
}
