<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * UrlAlias Entity
 *
 * @property int $url_alias_id
 * @property string $query
 * @property string $keyword
 */
class UrlAlias extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractUrlAlias
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
        'query' => true,
        'keyword' => true,
    ];
}
