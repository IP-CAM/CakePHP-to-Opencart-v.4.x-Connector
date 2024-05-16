<?php
namespace CakePHPOpencart\Model\Entity\Opencart2;

/**
 * ApiIp Entity
 *
 * @property int $api_ip_id
 * @property int $api_id
 * @property string $ip
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart2\Api $api
 */
class ApiIp extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractApiIp
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
        'api_id' => true,
        'ip' => true,
        'api' => true,
    ];
}
