<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Modification Entity
 *
 * @property int $modification_id
 * @property string $name
 * @property string $code
 * @property string $author
 * @property string $version
 * @property string $link
 * @property string $xml
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 */
class Modification extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractModification
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
        'code' => true,
        'author' => true,
        'version' => true,
        'link' => true,
        'xml' => true,
        'status' => true,
        'date_added' => true,
    ];
}
