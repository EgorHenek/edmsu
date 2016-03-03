<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use dosamigos\selectize\SelectizeTextInput;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model app\models\Sets */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

<?= $form->field($model, 'icon')->widget(InputFile::className(), [
    'language'      => 'ru',
    'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
    'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
    'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options'       => ['class' => 'form-control'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple'      => false       // возможность выбора нескольких файлов
]); ?>

<?= $form->field($model, 'tracklist')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 50,
        'imageManagerJson' => Url::to(['/sets/images-get']),
        'imageUpload' => Url::to('/sets/image-upload'),
        'plugins' => [
            'clips',
            'fullscreen',
            'imagemanager'
        ]
    ]
]) ?>

<div class="form-group field-sets-tagNames">
    <label class="control-label" for="sets-tracklist"><?= $model->getAttributeLabel('tagNames') ?></label>
    <?= SelectizeTextInput::widget([
        'name' => 'Sets[tagNames]',
        'loadUrl' => ['sets/tags'],
        'value' => $model->inputHelper(),
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'plugins' => ['remove_button'],
            'valueField' => 'name',
            'labelField' => 'name',
            'searchField' => ['name'],
            'create' => true,
    ]]) ?>
</div>

<?= $form->field($model, 'date_create')->textInput() ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
