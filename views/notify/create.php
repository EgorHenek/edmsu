<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Notify */

$this->title = 'Добавление нотификации';
$this->params['breadcrumbs'][] = ['label' => 'Нотификации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>
