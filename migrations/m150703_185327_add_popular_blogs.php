<?php

use yii\db\Schema;
use yii\db\Migration;

class m150703_185327_add_popular_blogs extends Migration
{
    public function safeUp()
    {
        $this->createTable('news_views', [
            'id' => Schema::TYPE_PK,
            'news_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'ip' => Schema::TYPE_INTEGER.' UNSIGNED NOT NULL',
            'view_datetime' => Schema::TYPE_DATETIME.' NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('news_views');
    }
}
