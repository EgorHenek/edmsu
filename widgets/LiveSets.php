<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Blogs;
use yii\helpers\Html;
use yii\helpers\Url;

class LiveSets extends Widget {
    public function run() {
        $sets = Blogs::find()->orderBy(['id' => SORT_DESC])->where('end_time > NOW() AND start_time < NOW()')->all();
        if(count($sets)>0) {
            $content = '<div class="well"><h4 class="text-center">Сейчас онлайн:</h4><hr/><div class="row"><div class="col-lg-12">';
            foreach ($sets as $set) {
                $content .= Html::a('<div class="row"><div class="col-mg-12"><span class="label label-danger">Live</span>'.$set->title, Url::toRoute(['/blogs/view', 'url' => $set->url])).'</div></div>';
            }
            $content .= '</div></div></div>';
            return $content;
        }else{
            return NULL;
        }
    }
}