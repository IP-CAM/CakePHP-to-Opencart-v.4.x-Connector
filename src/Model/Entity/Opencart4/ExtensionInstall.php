<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ExtensionInstall Entity
 *
 * @property int $extension_install_id
 * @property int $extension_id
 * @property int $extension_download_id
 * @property string $name
 * @property string $code
 * @property string $version
 * @property string $author
 * @property string $link
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Extension $extension
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ExtensionDownload $extension_download
 */
class ExtensionInstall extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractExtensionInstall
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
        'extension_id' => true,
        'extension_download_id' => true,
        'name' => true,
        'code' => true,
        'version' => true,
        'author' => true,
        'link' => true,
        'status' => true,
        'date_added' => true,
        'extension' => true,
        'extension_download' => true,
    ];
}
