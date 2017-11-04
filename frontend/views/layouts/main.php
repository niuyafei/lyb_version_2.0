<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="/bootstrap/js/jquery-2.1.3.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img src="<?= Url::to("/img/logo.jpg"); ?>" height="60" />
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
        $menuItems = [
            ['label' => '留学案例', 'url' => ['/site/index']],
            ['label' => '留学规划', 'url' => ['/plan/index']],
            ['label' => '留学咨询', 'url' => ['/consultation/index']],
            ['label' => '延伸服务', 'url' => ['/service/index']],
        ];
        if (Yii::$app->user->isGuest) {
//            $menuItems[] = ['label' => '注册', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => '登录', 'linkOptions' => ['data-toggle'=>'modal', 'data-target'=>'#login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->nickname . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'nav navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        ?>
<!--        <div class="collapse navbar-collapse">-->
<!--            <ul class="nav navbar-nav navbar-right">-->
<!--                <li class="active"><a href="--><?//= Url::to('/'); ?><!--">留学案例</a></li>-->
<!--                <li><a href="plan.html">留学规划</a></li>-->
<!--                <li><a href="order.html">预约咨询</a></li>-->
<!--                <li><a href="thinkimpact.html">延伸服务</a></li>-->
<!--                <li class="p-20 color-lightgray"><span> | </span></li>-->
<!--                <li><a href="#" data-toggle="modal" data-target="#login">登录</a></li>-->
<!--            </ul>-->
<!--        </div>-->
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<?= $content; ?>

<footer>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-xs-7 p-0">
                <p class="m-t-10 color-gray">
                    留洋帮 © 京ICP备14025251号-2<br> 咨询电话：400 610 0025
                </p>
            </div>
            <div class="col-xs-5 p-0">
                <div class="text-right">
                    <img src="<?= Url::to("/img/qrcord.jpg"); ?>" width="70">
                    <p>微信公众号</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
