<?php

namespace app\models;

use Yii;
use app\models\Sets;
use app\models\Blogs;
use yii\db\ActiveRecord;

/**
 * Модель базы данных tags
 * @property integer $id ID
 * @property file $file Название файла
 */

class Tags extends ActiveRecord
{
    /**
     * 
     * @return string
     */
    public static function tableName()
    {
        return 'tags';
    }
    
    /**
     * 
     * @return type
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['frequency'], 'integer'],
        ];
    }
    
    /**
     * 
     * @return type
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название'
        ];
    }
    
    public function getSets()
    {
        return $this->hasMany(Sets::className(), ['id' => 'set_id'])->viaTable('sets_tags', ['tag_id' => 'id']);
    }
    
    public function getBlogs()
    {
        return $this->hasMany(Blogs::className(), ['id' => 'blog_id'])->viaTable('blogs_tags', ['tag_id' => 'id']);
    }
}