<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * TopicToStore Entity
 *
 * @property int $topic_id
 * @property int $store_id
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Topic $topic
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Store $store
 */
class TopicToStore extends \CakePHPOpencart\Model\Entity\OpencartCommon\TopicToStore
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
        'topic' => true,
        'store' => true,
    ];
}
