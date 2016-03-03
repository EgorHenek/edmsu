<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Blogs;
use app\widgets\PopularBlogs;

$this->title = 'Портал о электронной музыке';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Молодой портал о электронной музыке: записи выступлений DJ, радиошоу, новости EDM индустрии, авторские блоги.'
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'EDM, Электронная музыка, Trance, House, Armin Van Buuren, Tiesto, Dub Step, Steve Aoki, Tomorrowland, EDC, UMF, Ultra Music Festival, Electronic Dance Music.'
]);
$this->registerLinkTag([
    'rel' => 'image_src',
    'href' => Url::home().'/images/logo.png',
]);
?>
<script type="text/javascript">
_hcwp = window._hcwp || [];
_hcwp.push({widget:"Bloggerstream", widget_id:29356, selector:".commentcount", label:"{%COUNT%}"});
(function() {
if("HC_LOAD_INIT" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage ||  "en").substr(0, 2).toLowerCase();
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/29356/"+lang+"/widget.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<?php foreach ($blogs as $blog): ?>
    <div class="row">
        <div class="heading">
            <h3><?= Html::a($blog->title, Url::toRoute(['/blogs/view', 'url' => $blog->url])); ?><small>
                <?php switch ($blog->type) {
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
                        if(date("Y-m-d H:i:s")>$blog->start_time && date("Y-m-d H:i:s")<$blog->end_time){echo '<span class="label label-danger">LIVE</span>';}elseif(date("Y-m-d H:i:s")>$blog->start_time && date("Y-m-d H:i:s")>$blog->end_time){echo '<span class="label label-danger">Трансляция окончена</span>';}else{echo '<span class="label label-danger">Начало трансляции:'.Yii::$app->formatter->asDatetime($blog->start_time).'</span>';};
                        break;
                    case Blogs::TYPE_OLDRECORD:
                        echo '<span class="label label-default">Блог</span>';
                        break;
                } ?>
            </small></h3>
        </div>
    </div>
    <div class="row">
        <?php if(!$blog->image==NULL): ?>
            <?= Html::img($blog->image, ['class' => 'img-responsive center-block']) ?>
        <?php endif; ?>
        <?= nl2br($blog->anotation) ?><br/>
        <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
        <div class="yashare-auto-init"
            data-yashareL10n="ru"
            data-yashareType="large"
            data-yashareQuickServices="vkontakte,facebook,twitter"
            data-yashareTheme="counter"
            data-yashareLink="<?= Url::toRoute(['/blogs/view', 'url' => $blog->url], true) ?>"
            ></div><i class="fa fa-comments"></i><?= Html::a('{%COUNT%}', Url::toRoute(['/blogs/view', 'url' => $blog->url]).'#hypercomments_widget', ['class' => 'commentcount']); ?> <i class="fa fa-eye"></i><?= PopularBlogs::watch($blog->id) ?><br/>Опубликовано: <?= Yii::$app->formatter->asDatetime($blog->datetime_publish) ?>
            <?php if(!Yii::$app->user->isGuest): ?>
                <?= Html::a('<i class="fa fa-pencil"></i>', Url::toRoute(['/blogs/update', 'url' => $blog->url])) ?>
                <?= Html::a('<i class="fa fa-trash-o"></i>', Url::toRoute(['/blogs/view', 'url' => $blog->url]), [
                    'data' => [
                        'confirm' => 'Вы действительно хотите удалить запись?',
                        'method' => 'post',
                    ],
                ]) ?>
            <?php endif; ?>
    </div>
    <hr/>
<?php endforeach; ?>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
