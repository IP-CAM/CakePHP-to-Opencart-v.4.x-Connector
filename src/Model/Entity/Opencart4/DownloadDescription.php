<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * DownloadDescription Entity
 *
 * @property int $download_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Download $download
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class DownloadDescription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractDownloadDescription
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
        'download' => true,
        'language' => true,
    ];
}
