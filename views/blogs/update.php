<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blogs */

$this->title = 'Редактирование: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1><?= Html::encode($this->title) ?></h1>
<hr/>
<?= $this->render('_form', [
    'model' => $model,
]) ?>
