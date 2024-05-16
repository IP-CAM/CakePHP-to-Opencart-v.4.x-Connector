<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Marketing Entity
 *
 * @property int $marketing_id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property int $clicks
 * @property \Cake\I18n\FrozenTime $date_added
 */
class Marketing extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractMarketing
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
        'description' => true,
        'code' => true,
        'clicks' => true,
        'date_added' => true,
    ];
}
