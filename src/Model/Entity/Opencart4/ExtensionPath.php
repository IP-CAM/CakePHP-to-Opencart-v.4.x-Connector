<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ExtensionPath Entity
 *
 * @property int $extension_path_id
 * @property int $extension_install_id
 * @property string $path
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ExtensionInstall $extension_install
 */
class ExtensionPath extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractExtensionPath
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
        'extension_install_id' => true,
        'path' => true,
        'extension_install' => true,
    ];
}
