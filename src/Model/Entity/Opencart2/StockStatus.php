<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * StockStatus Entity
 *
 * @property int $stock_status_id
 * @property int $language_id
 * @property string $name
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\StockStatus $stock_status
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 */
class StockStatus extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractStockStatus
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
        'stock_status' => true,
        'language' => true,
    ];
}
