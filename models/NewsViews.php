<?php

namespace app\models;

use Yii;
use DateTime;

/**
 * This is the model class for table "news_views".
 *
 * @property integer $id
 * @property integer $news_id
 * @property string $ip
 * @property string $view_datetime
 */
class NewsViews extends \yii\db\ActiveRecord
{
    public $cnt;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_views';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'ip', 'view_datetime'], 'required'],
            [['news_id', 'ip'], 'integer'],
            [['view_datetime'], 'date', 'format' => 'php:Y-m-d H:i:s'],
            [['view_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_id' => 'ID новости',
            'ip' => 'IP адрес',
            'view_datetime' => 'Время просмотра',
        ];
    }
    
    /**
     * Запись текущего времени перед проверкой значений
     * @return type
     */
    public function beforeValidate() {
        $visit_time = new DateTime();
        $this->view_datetime = $visit_time->format('Y-m-d H:i:s');
        return parent::beforeValidate();
    }
}
