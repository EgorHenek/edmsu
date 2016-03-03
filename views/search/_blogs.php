<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
?>


<?php if (count($blogs) == 0): ?>
По вашему запросу ничего не найдено
<?php else: ?>
    <?php foreach ($blogs as $blog): ?>
        <div class="row">
                <div class="heading">
                    <h3><?= Html::a($blog->title, Url::toRoute(['/blogs/view', 'url' => $blog->url])); ?></h3>
                </div>
            </div>
            <div class="row">
                <?= nl2br($blog->anotation) ?><br/>
                <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                <div class="yashare-auto-init"
                    data-yashareL10n="ru"
                    data-yashareType="large"
                    data-yashareQuickServices="vkontakte,facebook,twitter"
                    data-yashareTheme="counter"
                    data-yashareLink="<?= Url::toRoute(['/blogs/view', 'url' => $blog->url], true) ?>"
                ></div>Опубликовано: <?= Yii::$app->formatter->asDatetime($blog->datetime_publish) ?>
            </div>
        <hr/>
    <?php endforeach; ?>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
<?php endif; ?>
