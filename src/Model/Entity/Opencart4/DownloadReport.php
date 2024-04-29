<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * DownloadReport Entity
 *
 * @property int $download_report_id
 * @property int $download_id
 * @property int $store_id
 * @property string $ip
 * @property string $country
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Download $download
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 */
class DownloadReport extends \CakePHPOpencart\Model\Entity\OpencartCommon\DownloadReport
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
        'download_id' => true,
        'store_id' => true,
        'ip' => true,
        'country' => true,
        'date_added' => true,
        'download' => true,
        'store' => true,
    ];
}
