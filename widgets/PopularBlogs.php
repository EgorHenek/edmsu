<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\Blogs;
use app\models\NewsViews;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class PopularBlogs extends Widget {
    public function run() {
        $views = NewsViews::find()->select(['COUNT(*) AS cnt', 'news_id'])->where('view_datetime > NOW() - INTERVAL 7 DAY')->orderBy(['cnt' => SORT_ASC])->limit(10)->groupBy(['news_id'])->all();
        $blogs_id = ArrayHelper::getColumn($views, 'news_id');
        $blogs = Blogs::find()->where(['id' => $blogs_id])->all();
        $content = '<h4 class="text-center">ТОП-10 новостей:</h4><hr/><div class="row"><div class="col-lg-12">';
        foreach ($blogs as $blog) {
            $content .= Html::a('<div class="row"><div class="col-mg-12"><small>'.$blog->title.'</small>', Url::toRoute(['/blogs/view', 'url' => $blog->url])).'<br/><small><i class="fa fa-clock-o"></i>'.Yii::$app->formatter->asDate($blog->datetime_publish).'</small></div></div>';
        }
        $content .= '</div></div>';
        return $content;
    }
    
    public static function watch($id) {
        $views = NewsViews::find()->where('news_id = '.$id)->count();
        return $views;
    }
}
