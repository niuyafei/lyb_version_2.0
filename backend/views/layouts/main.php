<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use common\widgets\Alert;
use yii\bootstrap\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1,maximum-scale=1" name="viewport">
        <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head(); ?>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="<?= Url::to("/img/logo.jpg"); ?>" height="100%" />
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if(Yii::$app->user->isGuest): ?>
                            <li>
                                <a href="<?= Url::to(['site/login']); ?>">登陆</a>
                            </li>
                        <?php else: ?>
                            <li class="color-gray p-r-20">
                                <?= Yii::$app->user->identity->nickname; ?>
                            </li>
                            <li>
                                <a href="<?= Url::to(['site/logout']); ?>">退出登录</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <div class="container p-0 admin-cont">
            <div class="col-xs-2">
                <ul class="list-group m-b-0 admin-cont-nav">
                    <li class="list-group-item text-center">
                        <a href="<?= Url::to(['abordcase/index']); ?>" class="<?= $this->title == "留学案例" ? "focus" : "";?>">留学案例</a>
                    </li>
                    <li class="list-group-item text-center">
                        <a href="<?= Url::to(['plan/index']); ?>" class="<?= $this->title == "留学规划" ? "focus" : "";?>">留学规划</a>
                    </li>
                    <li class="list-group-item text-center">
                        <a href="<?= Url::to(['consultation/index']); ?>" class="<?= $this->title == "预约咨询" ? "focus" : "";?>">预约咨询</a>
                    </li>
                    <li class="list-group-item text-center">
                        <a href="<?= Url::to(['service/index']); ?>" class="<?= $this->title == "延伸服务" ? "focus" : "";?>">延伸服务</a>
                    </li>
                    <li class="list-group-item text-center">
                        <a href="<?= Url::to(['site/index']); ?>" class="<?= $this->title == "账号管理" ? "focus" : "";?>">账号管理</a>
                    </li>
                    <li class="list-group-item text-center">
                        <a href="<?= Url::to(['expert/index']); ?>" class="<?= $this->title == "专家管理" ? "focus" : "";?>">专家管理</a>
                    </li>
                </ul>
            </div>
            <?= $content; ?>
        </div>
        <footer>
            <hr />
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 p-0 text-center">
                        <p class="m-t-10 color-gray">
                            留洋帮 © 京ICP备14025251号-2<br> 咨询电话：400 610 0025
                        </p>
                    </div>
                </div>
            </div>
        </footer>
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


