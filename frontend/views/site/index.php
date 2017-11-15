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
                    <li><span class="color-gray">学生姓名：</span><?= $value->username; ?></li>
                    <li><span class="color-gray">申请项目：</span><?= \common\models\AbordCase::dropDown("applicationProject", $value->applicationProject); ?></li>
                    <li><span class="color-gray">成绩信息：</span>SAT <?= $value->sat; ?>，托福 <?= $value->toefl; ?></li>
                    <li><span class="color-gray">录取学校：</span><?= $value->admissionSchool; ?></li>
                    <li><span class="color-gray">录取专业：</span><?= $value->admissionMajor; ?></li>
                </ul>
                <div class="case-list-line">
                    <hr class="border-darkline"/>
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
