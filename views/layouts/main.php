<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\widgets\LastSets;
use app\widgets\PopularBlogs;
use app\widgets\Notifycation;
use app\widgets\LiveSets;
use app\widgets\PopularTags;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="no-js">
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title).' | EDM.SU' ?></title>
    <?php $this->head() ?>
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<?php $this->beginBody() ?>
    <!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter31891676 = new Ya.Metrika({ id:31891676, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/31891676" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
    <?php NavBar::begin(['brandLabel' => '<img alt="edm.su" src="../images/logo.png" class="logo">', 'options' => ['class' => 'navbar-inverse']]); 
    
    echo Nav::widget([
        'items' => [
            [
                'label' => 'Админ панель',
                'visible' => !Yii::$app->user->isGuest,
                'items' => [
                    ['label' => 'Добавить сет', 'url' => Url::toRoute('/sets/create')],
                    ['label' => 'Добавить новость', 'url' => Url::toRoute('/blogs/create')],
                    ['label' => 'Нотификации', 'url' => Url::toRoute('/notify')],
                    ['label' => 'Выход', 'url' => Url::toRoute(['/logout']),]
                ]
            ],
            [
                'label' => 'Записи сетов',
                'url' => Url::toRoute(['/sets']),
            ]
        ],
        'options' => ['class' => 'nav navbar-nav'],
    ]);
    echo '<form class="navbar-form navbar-left" role="search" action="/search/index" method="get">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Поиск" name="string">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </form>';
    
    NavBar::end();
    ?>
    
    <?= Notifycation::widget(); ?>
    
    <div id="#top"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= $content ?>
            </div>
            <div class="col-md-4">
                <div class="well">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- EDM.SU -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-5392006028438707"
                         data-ad-slot="4919489470"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <?= LiveSets::widget(); ?>
                <div class="well">
                    <?= LastSets::widget() ?>
                </div>
                <div class="well hidden-xs hidden-sm hidden-print">
                    <iframe width="100%" height="250" src="https://www.mixcloud.com/widget/follow/?u=https%3A%2F%2Fwww.mixcloud.com%2FEDMSU%2F&amp;hide_followers=0" frameborder="0"></iframe>
                </div>
                <div class="well">
                    <?= PopularBlogs::widget() ?>
                </div>
                <div class="well">
                    <?= PopularTags::widget() ?>
                </div>    
            </div>
        </div>
    </div>

    <footer class="footer copyright">
        <div class="container">
            <p class="pull-left">&copy; EDM.SU <?= date('Y') ?></p>
            <p class="pull-right">Публикация материалов возможна только с указанием обязательной ссылки на источник: EDM.SU</p>
        </div>
    </footer>
    
    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a> 

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
