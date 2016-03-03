<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Миграция создания тегов
 */
class m150512_101122_add_tags extends Migration
{
    public function safeUp()
    {
        $this->createTable('sets_tags', [
            'id' => Schema::TYPE_PK,
            'set_id' => Schema::TYPE_INTEGER.' NOT NULL',
            'tag_id' => Schema::TYPE_INTEGER.' NOT NULL',
        ]);
        $this->createTable('tags', [
            'id' => Schema::TYPE_PK,
            'frequency' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING. ' NOT NULL',
        ]);
    }

    public function safeDown()
    {
        $this->delete('sets_tags');
        $this->delete('tags');
    }
}
