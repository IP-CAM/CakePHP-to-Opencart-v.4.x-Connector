<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerWishlist Entity
 *
 * @property int $customer_id
 * @property int $product_id
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 */
class CustomerWishlist extends \CakePHPOpencart\Model\Entity\OpencartCommon\CustomerWishlist
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
        'date_added' => true,
        'customer' => true,
        'product' => true,
    ];
}
