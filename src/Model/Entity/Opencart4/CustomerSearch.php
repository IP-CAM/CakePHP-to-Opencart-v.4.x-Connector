<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * CustomerSearch Entity
 *
 * @property int $customer_search_id
 * @property int $store_id
 * @property int $language_id
 * @property int $customer_id
 * @property string $keyword
 * @property int $category_id
 * @property bool $sub_category
 * @property bool $description
 * @property int $products
 * @property string $ip
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Category $category
 */
class CustomerSearch extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCustomerSearch
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
        'store_id' => true,
        'language_id' => true,
        'customer_id' => true,
        'keyword' => true,
        'category_id' => true,
        'sub_category' => true,
        'description' => true,
        'products' => true,
        'ip' => true,
        'date_added' => true,
        'store' => true,
        'language' => true,
        'customer' => true,
        'category' => true,
    ];
}
