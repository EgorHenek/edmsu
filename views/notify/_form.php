<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;
use dosamigos\datetimepicker\DateTimePicker;
use app\models\Notify;

/* @var $this yii\web\View */
/* @var $model app\models\Notify */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'text')->widget(Widget::className(), [
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

<?= $form->field($model, 'start')->widget(DateTimePicker::className(), [
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

<?= $form->field($model, 'end')->widget(DateTimePicker::className(), [
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

<?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'delay')->textInput() ?>

<?= $form->field($model, 'type', ['inline' => true])->radioList([
    Notify::TYPE_INFO => 'Инфо',
    Notify::TYPE_DANGER => 'Предупреждение',
    Notify::TYPE_SUCCESS => 'Подтверждение',
    Notify::TYPE_WARNING => 'Срочно',
    Notify::TYPE_GROWL => 'APPLE Mac OS X',
    Notify::TYPE_MINIMALIST => 'Минималист',
    Notify::TYPE_PASTEL => 'Пастель',
], [
    'class' => 'btn-group',
    'data-toggle' => 'buttons',
    'unselect' => null,
    'item' => function ($index, $label, $name, $checked, $value) {
        return '<label class="btn btn-primary' . ($checked ? ' active' : '').'">' .
            Html::radio($name, $checked, ['value' => $value]) . $label . '</label>';
    },
]) ?>

<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
