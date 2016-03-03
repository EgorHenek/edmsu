<?php

use yii\db\Schema;
use yii\db\Migration;

class m150706_083020_update_blogs_table extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('blogs', 'date_create');
        $this->addColumn('blogs', 'type', Schema::TYPE_INTEGER.' NOT NULL');
        $this->addColumn('blogs', 'source_url', Schema::TYPE_STRING);
        $this->addColumn('blogs', 'anchor', Schema::TYPE_BOOLEAN.' DEFAULT FALSE');
        $this->addColumn('blogs', 'image', Schema::TYPE_STRING);
    }

    public function safeDown()
    {
        $this->addColumn('blogs', 'date_create', Schema::TYPE_DATE.' NOT NULL');
        $this->dropColumn('blogs', 'type');
        $this->dropColumn('blogs', 'source_url');
        $this->dropColumn('blogs', 'ancher');
        $this->dropColumn('blogs', 'image');
    }
}
