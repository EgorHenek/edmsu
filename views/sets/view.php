<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sets */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Сеты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Запись сета '.Html::encode($this->title)
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
<h3><b><?= Html::encode($this->title) ?></b></h3>
<hr/>
<p><i class="fa fa-calendar"></i>Опубликован: <?= Yii::$app->formatter->asDate($model->date_create) ?></p>
<hr/>

<?php if(!Yii::$app->user->isGuest): ?><p>
    <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]) ?>
</p><?php endif; ?>

<iframe width="100%" height="180" src="https://www.mixcloud.com/widget/iframe/?embed_type=widget_standard&amp;embed_uuid=a6fe8d23-1139-4733-9cc0-0fd9dae0c389&amp;feed=<?= $model->mixcloud ?>&amp;hide_artwork=1&amp;hide_cover=1&amp;hide_tracklist=1&amp;replace=0" frameborder="0"></iframe>
<p><b>Треклист:</b></p>
<?= nl2br($model->tracklist) ?>
<i class="fa fa-tags"></i><?php foreach($model->getTags()->all() as $tag): ?>
    <?= Html::a($tag->name, Url::toRoute(['/search/tags', 'tag' => $tag->name]), ['class' => 'btn btn-xs btn-primary']) ?>
<?php endforeach; ?>
<script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
<div class="yashare-auto-init"
    data-yashareL10n="ru"
    data-yashareType="large"
    data-yashareQuickServices="vkontakte,facebook,twitter"
    data-yashareTheme="counter"
    data-yashareLink="<?= Url::toRoute(['/sets/view', 'url' => $model->id], true) ?>"
    data-yashareTitle="<?= htmlspecialchars($model->title) ?>"
></div>
<hr/>
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
