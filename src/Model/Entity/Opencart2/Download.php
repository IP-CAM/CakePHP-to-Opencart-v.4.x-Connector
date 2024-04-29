<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Download Entity
 *
 * @property int $download_id
 * @property string $filename
 * @property string $mask
 * @property \Cake\I18n\FrozenTime $date_added
 */
class Download extends \CakePHPOpencart\Model\Entity\OpencartCommon\Download
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
        'filename' => true,
        'mask' => true,
        'date_added' => true,
    ];
}
