<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * Article Entity
 *
 * @property int $article_id
 * @property int $topic_id
 * @property string $author
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $date_added
 * @property \Cake\I18n\FrozenTime $date_modified
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Topic $topic
 */
class Article extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractArticle
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
        'topic_id' => true,
        'author' => true,
        'status' => true,
        'date_added' => true,
        'date_modified' => true,
        'topic' => true,
    ];
}
