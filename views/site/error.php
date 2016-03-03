<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Упс! Ошибка 404. Страница не найдена.'
]);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Упс!</h1>
                <h2>
                    Ошибка 404 Страница не найдена</h2>
                <div class="error-details">
                    К сожалению, произошла ошибка, Запрошенная Вами страница не найдена!
                </div>
                <div class="error-actions">
                    <a href="<?= Url::home(); ?>" class="btn btn-primary btn-lg"><span class="fa fa-home"></span>
                        Вернуться на главную </a><a href="<?= Url::to('/search') ?>" class="btn btn-default btn-lg"><span class="fa fa-search"></span> Перейти к поиску </a>
                </div>
            </div>
        </div>
    </div>
</div>
