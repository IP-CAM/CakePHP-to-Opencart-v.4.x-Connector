<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ArticleComment Entity
 *
 * @property int $article_comment_id
 * @property int $article_id
 * @property int $customer_id
 * @property string $comment
 * @property string $status
 * @property \Cake\I18n\FrozenTime $date_added
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Article $article
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Customer $customer
 */
class ArticleComment extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractArticleComment
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
        'article_id' => true,
        'customer_id' => true,
        'comment' => true,
        'status' => true,
        'date_added' => true,
        'article' => true,
        'customer' => true,
    ];
}
