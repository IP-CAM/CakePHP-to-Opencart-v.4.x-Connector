<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Currency Entity
 *
 * @property int $currency_id
 * @property string $title
 * @property string $code
 * @property string $symbol_left
 * @property string $symbol_right
 * @property string $decimal_place
 * @property float $value
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_modified
 */
class Currency extends \CakePHPOpencart\Model\Entity\OpencartCommon\Currency
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
        'title' => true,
        'code' => true,
        'symbol_left' => true,
        'symbol_right' => true,
        'decimal_place' => true,
        'value' => true,
        'status' => true,
        'date_modified' => true,
    ];
}
