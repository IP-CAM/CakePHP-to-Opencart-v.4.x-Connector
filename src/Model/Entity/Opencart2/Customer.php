<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Customer Entity
 *
 * @property int $customer_id
 * @property int $customer_group_id
 * @property int $store_id
 * @property int $language_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $password
 * @property string $salt
 * @property string|null $cart
 * @property string|null $wishlist
 * @property bool $newsletter
 * @property int $address_id
 * @property string $custom_field
 * @property string $ip
 * @property bool $status
 * @property bool $approved
 * @property bool $safe
 * @property string $token
 * @property string $code
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\CustomerGroup $customer_group
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Language $language
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Address $address
 */
class Customer extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractCustomer
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
        'customer_group_id' => true,
        'store_id' => true,
        'language_id' => true,
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'telephone' => true,
        'fax' => true,
        'password' => true,
        'salt' => true,
        'cart' => true,
        'wishlist' => true,
        'newsletter' => true,
        'address_id' => true,
        'custom_field' => true,
        'ip' => true,
        'status' => true,
        'approved' => true,
        'safe' => true,
        'token' => true,
        'code' => true,
        'date_added' => true,
        'customer_group' => true,
        'store' => true,
        'language' => true,
        'address' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token',
    ];
}
