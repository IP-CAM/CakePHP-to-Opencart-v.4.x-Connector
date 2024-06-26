<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ProductViewed Entity
 *
 * @property int $product_id
 * @property int $viewed
 */
class ProductViewed extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractProductViewed
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
        'viewed' => true,
    ];
}
