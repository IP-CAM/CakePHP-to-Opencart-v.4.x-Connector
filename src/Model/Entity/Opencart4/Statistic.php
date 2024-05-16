<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Statistic Entity
 *
 * @property int $statistics_id
 * @property string $code
 * @property float $value
 */
class Statistic extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractStatistic
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
        'code' => true,
        'value' => true,
    ];
}
