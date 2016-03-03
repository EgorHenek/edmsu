<?php

use yii\db\Schema;
use yii\db\Migration;

class m150802_133618_add_start_end_time_for_live extends Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->addColumn('blogs', 'start_time', Schema::TYPE_DATETIME);
        $this->addColumn('blogs', 'end_time', Schema::TYPE_DATETIME);
    }
    
    public function safeDown()
    {
        $this->dropColumn('blogs', 'start_time');
        $this->dropColumn('blogs', 'end_time');
    }
}
