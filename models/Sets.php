<?php

namespace app\models;

use Yii;
use dosamigos\taggable\Taggable;

/**
 * This is the model class for table "sets".
 *
 * @property integer $id
 * @property string $title
 * @property string $icon
 * @property string $mixcloud
 * @property string $tracklist
 * @property string $date_create
 *
 * @property Icons $icon0
 */
class Sets extends \yii\db\ActiveRecord
{
    public $tagNames;
    public $mp3_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'icon'], 'required'],
            [['tracklist'], 'string'],
            [['date_create', 'tagNames'], 'safe'],
            [['mp3_file'], 'file', 'extensions' => 'mp3,m4a,aac,mp4,ogg'],
            [['title', 'mixcloud', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'icon' => 'Иконка',
            'mixcloud' => 'MixCloud',
            'tracklist' => 'Треклист',
            'date_create' => 'Дата создания',
            'tagNames' => 'Теги',
            'mp3_file' => 'Аудио файл (принимаются форматы: mp3,m4a,aac,mp4,ogg)',
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
        return $this->hasMany(Tags::classname(), ['id' => 'tag_id'])->viaTable('sets_tags', ['set_id' => 'id']);
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
