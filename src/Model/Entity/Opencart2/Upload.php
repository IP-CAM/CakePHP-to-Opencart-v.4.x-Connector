<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Upload Entity
 *
 * @property int $upload_id
 * @property string $name
 * @property string $filename
 * @property string $code
 * @property \Cake\I18n\FrozenTime $date_added
 */
class Upload extends \CakePHPOpencart\Model\Entity\OpencartCommon\Upload
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
        'filename' => true,
        'code' => true,
        'date_added' => true,
    ];
}
