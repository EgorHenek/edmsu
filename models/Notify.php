<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notify".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $start
 * @property string $end
 * @property string $link
 * @property integer $delay
 * @property string $type Notify type
 */
class Notify extends \yii\db\ActiveRecord
{
    const TYPE_INFO = 1;
    const TYPE_DANGER = 2;
    const TYPE_SUCCESS = 3;
    const TYPE_WARNING = 4;
    const TYPE_GROWL = 5;
    const TYPE_MINIMALIST = 6;
    const TYPE_PASTEL = 7;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'start', 'type'], 'required'],
            [['text'], 'string'],
            [['start', 'end'], 'safe'],
            [['delay', 'type'], 'integer'],
            [['delay'], 'default', 'value' => 0],
            [['type'], 'default', 'value' => 1],
            [['title', 'link'], 'string', 'max' => 255],
            [['start', 'end'], 'date', 'format' => 'php:Y-m-d H:i:s'],
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
            'text' => 'Текст',
            'start' => 'Начало показа',
            'end' => 'Конец показа',
            'link' => 'Ссылка',
            'delay' => 'Секунд до автоматического закрытия',
            'type' => 'Тип нотификации',
        ];
    }
    
    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->delay *= 1000;
            return true;
        } else {
            return false;
        }
    }
}
