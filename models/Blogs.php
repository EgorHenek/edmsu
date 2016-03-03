<?php

namespace app\models;

use Yii;
use dosamigos\taggable\Taggable;

/**
 * This is the model class for table "blogs".
 *
 * @property integer $id ID blog
 * @property string $url String for blog url
 * @property string $title Title
 * @property string $anotation Anotation
 * @property string $text Text
 * @property integer $type Blog type
 * @property string $source_url Link on source post
 * @property boolean $anchor Ancher on first position
 * @property string $image Image
 * @property string $datetime_publish Date create
 */
class Blogs extends \yii\db\ActiveRecord
{
    const TYPE_BLOG = 1;
    const TYPE_TRANSLATE = 2;
    const TYPE_COPYPASTE = 3;
    const TYPE_REDIRECT = 4;
    const TYPE_LIVE = 5;
    const TYPE_OLDRECORD = 6;

    public $tagNames = [];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blogs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'title', 'anotation', 'text', 'datetime_publish', 'type', 'image'], 'required'],
            [['source_url', 'source_title'], 'required', 'when' => function($model) {
                    return ($model->type >= 2 && $model->type <= 4) ;
                }, 'whenClient' => "function (attribute, value) {
                    return $('#type').val() >= 2 && $('#type').val() <= 4;
                }"],
            [['start_time', 'end_time'], 'required', 'when' => function($model) {
                    return $model->type == 5;
            }, 'whenClient' => "function (attribute,value) {
                    return $('#type').val() == 5;
                }"],
            [['type'], 'integer', 'min' => 1, 'max' => 6],
            [['type'], 'default', 'value' => 1],
            [['source_url'], 'url'],
            ['anchor', 'boolean'],
            ['anchor', 'default', 'value' => FALSE],
            [['datetime_publish', 'start_time', 'end_time'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['anotation', 'text'], 'string'],
            [['datetime_publish', 'tagNames'], 'safe'],
            [['url', 'title', 'image', 'source_title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url адрес статьи',
            'title' => 'Заголовок',
            'anotation' => 'Аннотация',
            'text' => 'Текст',
            'datetime_publish' => 'Дата размещения',
            'start_time' => 'Время начала трансляции',
            'end_time' => 'Время конца трансляции',
            'type' => 'Тип статьи',
            'source_url' => 'Ссылка на источник',
            'anchor' => 'Закрепть статью',
            'image' => 'Изображение',
            'tagNames' => 'Тэги',
            'source_title' => 'Название источника',
        ];
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => Taggable::className(),
            ]
        ];
    }
    
    public function getTags()
    {
        return $this->hasMany(Tags::classname(), ['id' => 'tag_id'])->viaTable('blogs_tags', ['blog_id' => 'id']);
    }
    
    public function inputHelper()
    {
        $tagNames = '';
        foreach ($this->getTags()->all() as $tag) {
            $tagNames = $tag->name.','.$tagNames;
        }
        return $tagNames;
    }
}
