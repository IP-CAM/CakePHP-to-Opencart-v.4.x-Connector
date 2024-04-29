<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Return Entity
 *
 * @property int $return_id
 * @property int $order_id
 * @property int $product_id
 * @property int $customer_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $model
 * @property int $quantity
 * @property bool $opened
 * @property int $return_reason_id
 * @property int $return_action_id
 * @property int $return_status_id
 * @property string $comment
 * @property \Cake\I18n\FrozenDate $date_ordered
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Product $product
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Order $order
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ReturnReason $return_reason
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ReturnAction $return_action
 * @property \CakePHPOpencart\Model\Entity\Opencart4\ReturnStatus $return_status
 */
class Return extends \CakePHPOpencart\Model\Entity\OpencartCommon\Return
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
        'order_id' => true,
        'product_id' => true,
        'customer_id' => true,
        'firstname' => true,
        'lastname' => true,
        'email' => true,
        'telephone' => true,
        'product' => true,
        'model' => true,
        'quantity' => true,
        'opened' => true,
        'return_reason_id' => true,
        'return_action_id' => true,
        'return_status_id' => true,
        'comment' => true,
        'date_ordered' => true,
        'date_added' => true,
        'date_modified' => true,
        'order' => true,
        'customer' => true,
        'return_reason' => true,
        'return_action' => true,
        'return_status' => true,
    ];
}
