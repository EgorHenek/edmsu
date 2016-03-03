<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<?php if (count($sets) == 0): ?>
По вашему запросу ничего не найдено
<?php else: ?>
    <?php foreach ($sets as $set): ?>
        <div class="row">
            <a href="<?= Url::toRoute(['/sets/view', 'id' => $set->id]) ?>" style="float: left; margin: 7px 7px 7px 0">
                <?= Html::img($set->icon, ['width' => 70]) ?>
            </a>
            <?= Html::a($set->title, Url::toRoute(['/sets/view', 'id' => $set->id])) ?><br/>
            <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script><div class="yashare-auto-init"
                data-yashareL10n="ru"
                data-yashareType="large"
                data-yashareQuickServices="vkontakte,facebook,twitter"
                data-yashareTheme="counter"
                data-yashareLink="<?= Url::toRoute(['/sets/view', 'url' => $set->id], true) ?>"
            ></div>
        </div>
    <?php endforeach; ?>
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
<?php endif; ?>
