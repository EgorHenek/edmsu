<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сеты';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Сеты диджеев, записи радиошоу.'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'EDM, Электронная музыка, Trance, House, Armin Van Buuren, Tiesto, Dub Step, Steve Aoki, Tomorrowland, EDC, UMF, Ultra Music Festival, Electronic Dance Music.'
]);
$this->registerLinkTag([
    'rel' => 'image_src',
    'href' => '../images/banner-bg.jpg',
]);
?>
<h1><?= Html::encode($this->title) ?></h1>
<hr/>
<?php if(!Yii::$app->user->isGuest){echo Html::a('Добавить', ['create'], ['class' => 'btn btn-primary']);} ?>
<?php foreach ($sets as $set): ?>
    <div class="row">
        <a href="<?= Url::toRoute(['/sets/view', 'id' => $set->id]) ?>" style="float: left; margin: 7px 7px 7px 0">
            <?= Html::img($set->icon, ['width' => 70]) ?>
        </a>
        <?= Html::a($set->title, Url::toRoute(['/sets/view', 'id' => $set->id])) ?><br/>
        <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
        <div class="yashare-auto-init"
            data-yashareL10n="ru"
            data-yashareType="large"
            data-yashareQuickServices="vkontakte,facebook,twitter"
            data-yashareTheme="counter"
            data-yashareLink="<?= Url::toRoute(['/sets/view', 'url' => $set->id], true) ?>"
        ></div>
        <i class="fa fa-calendar"></i>Опубликован: <?= Yii::$app->formatter->asDate($set->date_create) ?>
    </div>
<?php endforeach; ?>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
