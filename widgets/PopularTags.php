<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Tags;
use yii\helpers\Html;
use yii\helpers\Url;

class PopularTags extends Widget {
    public function run() {
        $tags = Tags::find()->orderBy(['frequency' => SORT_DESC])->limit(25)->all();
        $content = '<h4 class="text-center">Популярные теги:</h4><hr/><div class="row"><div class="col-lg-12">';
        foreach ($tags as $tag) {
            $content .= Html::a($tag->name.' ', Url::toRoute(['/search/tags', 'tag' => $tag->name]));
        }
        $content .= '</div></div>';
        return $content;
    }
}