<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

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
 * @property string $password
 * @property string $custom_field
 * @property bool $newsletter
 * @property string $ip
 * @property bool $status
 * @property bool $safe
 * @property string $token
 * @property string $code
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\CustomerGroup $customer_group
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class Customer extends \CakePHPOpencart\Model\Entity\OpencartCommon\Customer
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
        'password' => true,
        'custom_field' => true,
        'newsletter' => true,
        'ip' => true,
        'status' => true,
        'safe' => true,
        'token' => true,
        'code' => true,
        'date_added' => true,
        'customer_group' => true,
        'store' => true,
        'language' => true,
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
