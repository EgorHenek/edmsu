<?php

use yii\db\Schema;
use yii\db\Migration;

class m150802_142121_add_source_title_in_blog extends Migration
{
    public function safeUp()
    {
        $this->addColumn('blogs', 'source_title', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('blogs', 'source_title');
    }
}
