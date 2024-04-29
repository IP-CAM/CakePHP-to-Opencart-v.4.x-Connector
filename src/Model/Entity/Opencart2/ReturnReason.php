<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ReturnReason Entity
 *
 * @property int $return_reason_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\ReturnReason $return_reason
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 */
class ReturnReason extends \CakePHPOpencart\Model\Entity\OpencartCommon\ReturnReason
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
        'return_reason' => true,
        'language' => true,
    ];
}
