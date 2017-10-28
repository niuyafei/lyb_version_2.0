<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = '留学案例';
?>
<div class="container">
    <h2 class="text-center m-t-30"><?= $this->title; ?></h2>
    <hr class="cont-tit-border" />
    <div class="row case-list">
        <?php foreach($data as $value): ?>
            <div class="col-xs-4 case-list-bg">
                <ul class="case-list-cont">
                    <li><span class="color-gray">学生姓名：</span><?= $value->user->nickname; ?></li>
                    <li><span class="color-gray">申请项目：</span><?= \common\models\AbordCase::dropDown("applicationProject", $value->applicationProject); ?></li>
                    <li><span class="color-gray">成绩信息：</span>SAT <?= $value->sat; ?>，托福 <?= $value->toefl; ?></li>
                    <li><span class="color-gray">录取学校：</span><?= $value->admissionSchool; ?></li>
                    <li><span class="color-gray">录取专业：</span><?= $value->admissionMajor; ?></li>
                </ul>
                <div class="case-list-line">
                    <hr />
                </div>
                <div class="case-list-btn">
                    <div class="col-xs-6">
                        <a href="<?= Url::to(['abordcase/detail', 'case_id' => $value->case_id]); ?>" class="btn btn-block btn-outline">案例详情</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="<?= Url::to(['plan/index']); ?>" class="btn btn-block btn-outline">留学规划</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <nav class="text-center">
        <?= LinkPager::widget([
            'pagination' => $pages,
            'maxButtonCount' => 5,
            'options' => ['class' => 'pagination']
        ]) ?>
    </nav>
</div>

<div class="modal" tabindex="-1" role="dialog" id="login">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title color-blue">登录</h4>
            </div>
            <div class="modal-body m-t-15 m-b-30">
                <div class="row m-t-10">
                    <a href="" class="color-black">
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
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
