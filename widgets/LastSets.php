<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Sets;
use yii\helpers\Html;
use yii\helpers\Url;

class LastSets extends Widget {
    public function run() {
        $sets = Sets::find()->orderBy(['id' => SORT_DESC])->limit(8)->all();
        $content = '<h4 class="text-center">Последние '.Html::a('сеты', Url::toRoute(['/sets'])).':</h4><hr/><div class="row"><div class="col-lg-12">';
        foreach ($sets as $set) {
            $img = Html::img($set->icon, ['height' => '30px', 'width' => '30px', 'class' => 'img-rounded', 'style' => 'float:left']);
            $content .= Html::a('<div class="row"><div class="col-mg-12">'.$img.'<small>'.$set->title.'</small>', Url::toRoute(['/sets/view', 'id' => $set->id])).'</div></div>';
        }
        $content .= '</div></div>';
        return $content;
    }
}