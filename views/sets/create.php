<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sets */

$this->title = 'Создание сета';
$this->params['breadcrumbs'][] = ['label' => 'Сеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_create', [
        'model' => $model,
    ]) ?>

</div>
