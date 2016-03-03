<?php

use yii\db\Schema;
use yii\db\Migration;

class m150805_142924_add_notify extends Migration
{
    public function safeUp()
    {
        $this->createTable('notify', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING.' NOT NULL',
            'text' => Schema::TYPE_TEXT,
            'start' => Schema::TYPE_DATETIME.' NOT NULL',
            'end' => Schema::TYPE_DATETIME,
            'link' => Schema::TYPE_STRING,
            'delay' => Schema::TYPE_INTEGER,
            'type' => Schema::TYPE_SMALLINT.' NOT NULL',
        ]);
    }
    
    public function safeDown()
    {
        $this->dropTable('notify');
    }
}
