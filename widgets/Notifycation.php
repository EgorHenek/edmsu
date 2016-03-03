<?php

namespace app\widgets;

use yii;
use yii\base\Widget;
use app\models\Notify;
use kartik\growl\Growl;


class Notifycation extends Widget {
    public function run() {
        $notify = Notify::find()->where('(end > NOW() OR end IS NULL) AND start < NOW()')->orderBy(['id' => SORT_DESC])->all();
        foreach ($notify as $not) {
            switch ($not->type) {
                case 1: $type = Growl::TYPE_INFO; break;
                case 2: $type = Growl::TYPE_DANGER; break;
                case 3: $type = Growl::TYPE_SUCCESS; break;
                case 4: $type = Growl::TYPE_WARNING; break;
                case 5: $type = Growl::TYPE_GROWL; break;
                case 6: $type = Growl::TYPE_MINIMALIST; break;
                case 7: $type = Growl::TYPE_PASTEL; break;
            } 
            echo Growl::widget([
                'type' => $type,
                'title' => $not->title,
                'showSeparator' => true,
                'body' => $not->text,
                'linkUrl' => $not->link,
                'delay' => $not->delay,
            ]);
        }
    }
}
