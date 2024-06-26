<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Extension Entity
 *
 * @property int $extension_id
 * @property string $extension
 * @property string $type
 * @property string $code
 */
class Extension extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractExtension
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
        'extension' => true,
        'type' => true,
        'code' => true,
    ];
}
