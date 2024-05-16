<?php
namespace CakePHPOpencart\Model\Entity\Opencart4;

/**
 * ArticleDescription Entity
 *
 * @property int $article_id
 * @property int $language_id
 * @property string $image
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 *
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Article $article
 * @property \CakePHPOpencart\Model\Entity\Opencart4\Language $language
 */
class ArticleDescription extends \CakePHPOpencart\Model\Entity\OpencartAbstract\AbstractArticleDescription
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
        'image' => true,
        'name' => true,
        'description' => true,
        'tag' => true,
        'meta_title' => true,
        'meta_description' => true,
        'meta_keyword' => true,
        'article' => true,
        'language' => true,
    ];
}
