<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\selectize\SelectizeTextInput;
use app\models\Blogs;
use mihaildev\elfinder\InputFile;

$this->registerJsFile('/js/create.js', ['depends' => [\yii\web\JqueryAsset::className()]]); 
/* @var $this yii\web\View */
/* @var $model app\models\Blogs */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'type', ['inline' => true])->radioList([
    Blogs::TYPE_BLOG => 'Блог',
    Blogs::TYPE_TRANSLATE => 'Перевод',
    Blogs::TYPE_COPYPASTE => 'Копипаста',
    Blogs::TYPE_REDIRECT => 'Редирект',
    Blogs::TYPE_LIVE => 'Лайв',
], [
    'class' => 'btn-group',
    'data-toggle' => 'buttons',
    'unselect' => null,
    'item' => function ($index, $label, $name, $checked, $value) {
        return '<label class="btn btn-primary' . ($checked ? ' active' : '') . '" onClick='.($value>=2&&$value<=4 ? 'showSource();' : 'hideSource();').($value==5 ? 'showTime();' : 'hideTime();').'>' .
            Html::radio($name, $checked, ['value' => $value]) . $label . '</label>';
    },
]) ?>

<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'image')->widget(InputFile::className(), [
    'language' => 'ru',
    'controller' => 'elfinder',
    'filter' => 'image',
    'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
    'options' => ['class' => 'form-control'],
    'buttonOptions' => ['class' => 'btn btn-default'],
    'multiple' => false
]); ?>

<?= $form->field($model, 'anotation')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 50,
        'imageManagerJson' => Url::to(['/blogs/images-get']),
        'imageUpload' => Url::to('/blogs/image-upload'),
        'plugins' => [
            'clips',
            'fullscreen',
            'imagemanager'
        ]
    ]
]) ?>

<?= $form->field($model, 'text')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 50,
        'imageManagerJson' => Url::to(['/blogs/images-get']),
        'imageUpload' => Url::to('/blogs/image-upload'),
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
        'name' => 'Blogs[tagNames]',
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

<?= $form->field($model, 'source_title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'source_url')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'datetime_publish')->widget(DateTimePicker::className(), [
    'language' => 'ru',
    'size' => 'ms',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss', // if inline = false
        'todayBtn' => true
    ]
]) ?>

<?= $form->field($model, 'start_time')->widget(DateTimePicker::className(), [
    'language' => 'ru',
    'size' => 'ms',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        'maxView' => 1,
        'autoclose' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss', // if inline = false
        'todayBtn' => true
    ]
]) ?>

<?= $form->field($model, 'end_time')->widget(DateTimePicker::className(), [
    'language' => 'ru',
    'size' => 'ms',
    'pickButtonIcon' => 'glyphicon glyphicon-time',
    'clientOptions' => [
        'startView' => 1,
        'minView' => 0,
        'maxView' => 1,
        'autoclose' => true,
        'format' => 'yyyy-mm-dd hh:ii:ss', // if inline = false
        'todayBtn' => true
    ]
]) ?>

<?= $form->field($model, 'anchor', ['inline' => true])->checkboxList([
    TRUE => 'Закрепить',
], [
    'class' => 'btn-group',
    'data-toggle' => 'buttons',
    'unselect' => null,
    'item' => function ($index, $label, $name, $checked, $value) {
        return '<label class="btn btn-primary' . ($checked ? ' active' : '') . '">' .
            Html::checkbox($name, $checked, ['value' => $value]) . $label . '</label>';
    },
]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
