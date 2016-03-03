<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Migration create blogs
 */
class m150514_160624_add_blog_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('blogs', [
            'id' => Schema::TYPE_PK,
            'url' => Schema::TYPE_STRING.' NOT NULL',
            'title' => Schema::TYPE_STRING.' NOT NULL',
            'anotation' => Schema::TYPE_TEXT.' NOT NULL',
            'text' => Schema::TYPE_TEXT.' NOT NULL',
            'date_create' => Schema::TYPE_DATE.' NOT NULL',
            'datetime_publish' => Schema::TYPE_DATETIME.' NOT NULL',
        ]);
        $this->createTable('blogs_tags', [
            'id' => Schema::TYPE_PK,
            'blog_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'tag_id' => Schema::TYPE_INTEGER.' NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->delete('blogs');
        $this->delete('blogs_tags');
    }
}
