<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SetsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Поиск по сайту EDM.SU'
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
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'method' => 'get', 'action' => ['search/index'], 'fieldConfig' => [
    'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
    'horizontalCssClasses' => [
        'label' => 'col-sm-12',
        'offset' => 'col-sm-offset-12',
        'wrapper' => 'col-sm-12',
        'error' => '',
        'hint' => '',
    ]]]); ?>
    <?= $form->field($search, 'string')->textInput(['placeholder' => 'Введите текст запроса', 'name' => 'string']); ?>
    <?= Html::submitButton('Найти', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>
