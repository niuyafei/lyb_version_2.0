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
            <a class="navbar-brand" href="<?= Url::to(['site/index']); ?>">
                <img src="<?= Url::to("/img/logo.jpg"); ?>" height="60" />
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <?php
        $menuItems = [
            ['label' => '留学案例', 'url' => ['/site/index']],
            ['label' => '留学规划', 'url' => ['/plan/index']],
            ['label' => '预约咨询', 'url' => ['/consultation/index']],
            ['label' => '延伸服务', 'url' => ['/service/index']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => '登录', 'linkOptions' => ['data-toggle'=>'modal', 'data-target'=>'#login']];
        } else {
//            $menuItems[] = '<li>'
//                . Html::beginForm(['/site/logout'], 'post')
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->nickname . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>';
            $menuItems[] = '<li class="dropdown">
                <div class="pull-left m-t-10 m-r-10 img-circle">
                    <img width="35" height="35" src="'.Yii::$app->getUser()->identity->headImgUrl.'" />
                </div>
                <a href="#" class="dropdown-toggle pull-left top-nav-right" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.Yii::$app->getUser()->identity->nickname.' <span class="caret"></span>
                    <p>
                        <a href="/site/logout" class="color-blue p-0 m-0"><small>退出</small></a>
                    </p>
                </a>
                <ul class="dropdown-menu">
                    <li class="text-right">
                        <a href="/plan/view">我的方案</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li class="text-right">
                        <a href="/consultation/view">我的咨询</a>
                    </li>
                </ul>
            </li>';
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

<div class="modal" tabindex="-1" role="dialog" id="login">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title color-blue">登录</h4>
            </div>
            <div class="modal-body m-t-15 m-b-30">
                <div class="row m-t-10">
                    <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wxd66fddd82cb463cb&redirect_uri=http%3a%2f%2fhelper.liuyangbang.cn%2fwx%2fget-code&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect" class="color-black">
                        <div class="col-xs-6 text-center p-l-35">
                            <img src=<?= Url::to("/img/wechat.jpg"); ?> width="70" />
                            <p class="m-t-10">微信登录</p>
                        </div>
                    </a>
                    <a href="" class="color-black">
                        <div class="col-xs-6 text-center p-r-35">
                            <img src="<?= Url::to("/img/qq.jpg"); ?>" width="70" />
                            <p class="m-t-10">QQ登录</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script type="text/javascript">
    var message = "<?= Yii::$app->session->hasFlash('success') ? Yii::$app->session->getFlash('success') : (Yii::$app->session->hasFlash('error') ? Yii::$app->session->getFlash('error') : ""); ?>";
    if(message.length > 0){
        layer.open({
            title:'警告信息',
            'content':message
        });
    }
</script>
