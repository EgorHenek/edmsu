<?php

use yii\db\Schema;
use yii\db\Migration;

class m150718_075547_old_record extends Migration
{
    public function safeUp()
    {
        $this->update('blogs', ['type' => 6]);
    }
}
