<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Topic Entity
 *
 * @property int $topic_id
 * @property int $sort_order
 * @property bool $status
 */
class Topic extends \CakePHPOpencart\Model\Entity\OpencartCommon\Topic
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
        'sort_order' => true,
        'status' => true,
    ];
}
