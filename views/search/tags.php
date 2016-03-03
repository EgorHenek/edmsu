<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи по тегу '.$model->name;
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Результаты поиска по запросу '.$model->name
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'EDM, Электронная музыка, Trance, House, Armin Van Buuren, Tiesto, Dub Step, Steve Aoki, Tomorrowland, EDC, UMF, Ultra Music Festival, Electronic Dance Music, '.$model->name
]);
$this->registerLinkTag([
    'rel' => 'image_src',
    'href' => '../images/banner-bg.jpg',
]);
?>
<h3><?= Html::encode($this->title) ?></h3>
<?= Tabs::widget([
    'items' => [
        [
            'label' => 'Блоги ('.count($blogs).')',
            'headerOptions' => ['class' => 'col-sm-6 text-center'],
            'content' =>  $this->render('_blogs', ['blogs' => $blogs, 'pagination' => $blogs_pagination]),
        ],
        [
            'label' => 'Сеты ('.count($sets).')',
            'headerOptions' => ['class' => 'col-sm-6 text-center'],
            'content' =>  $this->render('_sets', ['sets' => $sets, 'pagination' => $sets_pagination]),
        ]
    ]
]); ?>
