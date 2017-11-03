<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

use common\models\Plan;

$this->title = "留学案例";
?>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> - 查看规划信息</h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <div class="case-edit-cont">
            <div class="text-center color-gray p-l-20">申请项目</div>
            <h4 class="text-center m-b-20 color-blue m-t-0"><?= Plan::dropDown($model->applicationProject); ?></h4>
            <div class="row case-edit-formwidth">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>姓名：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->username; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>手机号码：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->phone; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>微信：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10 color-gray"><?= $model->weixin; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>邮箱：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->email; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>就读学校：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->currentSchool; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>就读年级：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->grade; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>TOEFL：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->toefl; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>雅思：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->ielts; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>SAT：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->sat; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>ACT：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->act; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>高中GPA：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->gpa_h; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="row">
                        <div class="col-xs-3 text-right p-r-0">
                            <b>AP课程：</b>
                        </div>
                        <div class="col-xs-9">
                            <div class="p-l-10"><?= $model->ap; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="case-edit-cont">
                <div class="row case-edit-formwidth">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>获奖情况：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->winning; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row case-edit-formwidth">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>社团活动：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10 color-gray"><?= $model->communityActivities; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row case-edit-formwidth">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>公益活动：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->publicBenefitActivities; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="text-center">
                    <?php Html::a("编辑规划", ["plan/update?plan_id=".$model->plan_id]); ?>
<!--                    <a href="plan_edit_admin.html" class="btn btn-blue btn-lg p-l-20 p-r-20">编辑规划</a>-->
                </div>
            </div>
        </div>
    </div>
</div>