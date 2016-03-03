<?php

use yii\db\Schema;
use yii\db\Migration;

class m150506_103837_create_sets_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('sets', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'icon' => Schema::TYPE_STRING . ' NOT NULL',
            'mixcloud' => Schema::TYPE_STRING . ' NOT NULL',
            'tracklist' => Schema::TYPE_TEXT,
            'date_create' => Schema::TYPE_DATE,
        ]);
    }

    public function down()
    {
        $this->dropTable('sets');
    }
}
