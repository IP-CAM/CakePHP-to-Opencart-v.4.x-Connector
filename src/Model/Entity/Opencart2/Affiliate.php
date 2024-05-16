<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * Affiliate Entity
 *
 * @property int $affiliate_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $password
 * @property string $salt
 * @property string $company
 * @property string $website
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $postcode
 * @property int $country_id
 * @property int $zone_id
 * @property string $code
 * @property float $commission
 * @property string $tax
 * @property string $payment
 * @property string $cheque
 * @property string $paypal
 * @property string $bank_name
 * @property string $bank_branch_number
 * @property string $bank_swift_code
 * @property string $bank_account_name
 * @property string $bank_account_number
 * @property string $ip
 * @property bool $status
 * @property bool $approved
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Country $country
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Zone $zone
 */
class Affiliate extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractAffiliate
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
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'telephone' => true,
        'fax' => true,
        'password' => true,
        'salt' => true,
        'company' => true,
        'website' => true,
        'address_1' => true,
        'address_2' => true,
        'city' => true,
        'postcode' => true,
        'country_id' => true,
        'zone_id' => true,
        'code' => true,
        'commission' => true,
        'tax' => true,
        'payment' => true,
        'cheque' => true,
        'paypal' => true,
        'bank_name' => true,
        'bank_branch_number' => true,
        'bank_swift_code' => true,
        'bank_account_name' => true,
        'bank_account_number' => true,
        'ip' => true,
        'status' => true,
        'approved' => true,
        'date_added' => true,
        'country' => true,
        'zone' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
