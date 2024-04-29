<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Review Entity
 *
 * @property int $review_id
 * @property int $product_id
 * @property int $customer_id
 * @property string $author
 * @property string $text
 * @property int $rating
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Customer $customer
 */
class Review extends \CakePHPOpencart\Model\Entity\OpencartCommon\Review
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
        'product_id' => true,
        'customer_id' => true,
        'author' => true,
        'text' => true,
        'rating' => true,
        'status' => true,
        'date_added' => true,
        'date_modified' => true,
        'product' => true,
        'customer' => true,
    ];
}
