<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\models\Blogs;

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => htmlspecialchars(strip_tags($model->anotation)),
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $keys. 'EDM',
]);
$this->registerLinkTag([
    'rel' => 'image_src',
    'href' =>  $model->image,
]);
?>

<h1 class="page-header"><?= Html::encode($this->title) ?><small>
    <?php switch ($model->type) {
        case Blogs::TYPE_BLOG:
            echo '<span class="label label-default">Блог</span>';
            break;
        case Blogs::TYPE_COPYPASTE:
            echo '<span class="label label-default">Блог</span>';
            break;
        case Blogs::TYPE_TRANSLATE:
            echo '<span class="label label-success">Перевод</span>';
            break;
        case Blogs::TYPE_REDIRECT:
            echo '<span class="label label-info">Редирект</span>';
            break;
        case Blogs::TYPE_LIVE:
            echo '<span class="label label-danger">LIVE</span>';
            break;
        case Blogs::TYPE_OLDRECORD:
            echo '<span class="label label-default">Блог</span>';
            break;
    } ?>
</small></h1>

<p><i class="fa fa-calendar"></i>Опубликован: <?= Yii::$app->formatter->asDate($model->datetime_publish) ?></p>
<hr/>

<?php if(!Yii::$app->user->isGuest): ?>
    <p>
        <?= Html::a('Обновить', ['update', 'url' => $model->url], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'url' => $model->url], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<?php endif; ?>

<?php if(!$model->image==NULL): ?>
    <?= Html::img($model->image, ['class' => 'img-responsive center-block']) ?>
<?php endif; ?>
<p>
    <?= $model->text; ?>
</p>
 <i class="fa fa-tags"></i><?php foreach($tags as $tag): ?>
    <?= Html::a($tag->name, Url::toRoute(['/search/tags', 'tag' => $tag->name]), ['class' => 'btn btn-xs btn-primary']) ?>
<?php endforeach; ?>
<?php if(!$model->source_url==NULL): ?>
    <br/><i class="fa fa-link"></i>Источник: <?= Html::a($model->source_title, $model->source_url, ['class' => 'btn btn-success btn-xs']); ?>
<?php endif; ?>
<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init"
    data-yashareL10n="ru"
    data-yashareType="large"
    data-yashareQuickServices="vkontakte,facebook,twitter"
    data-yashareTheme="counter"
    data-yashareLink="<?= Url::canonical() ?>"
>></div>
<div id="hypercomments_widget" class="well"></div>
<script type="text/javascript">
    _hcwp = window._hcwp || [];
    _hcwp.push({widget:"Stream", widget_id: 29356});
    (function() {
    if("HC_LOAD_INIT" in window)return;
    HC_LOAD_INIT = true;
    var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
    var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
    hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/29356/"+lang+"/widget.js";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hcc, s.nextSibling);
    })();
</script>
<a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>
