<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

use common\models\Plan;

$this->title = "留学规划";
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
                            <div class="p-l-10 color-gray"><?= $model->weixin == "" ? "无内容" : $model->weixin; ?></div>
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
                            <div class="p-l-10"><?= $model->ielts == "" ? "无内容" : $model->itlts; ?></div>
                            <hr class="m-t-5 m-b-0" />
                        </div>
                    </div>
                </div>
            </div>
            <?php if($model->applicationProject == 1): ?>
                <!-- 美高 -->
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>SSAT：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->ssat == "" ? "无内容" : $model->ssat; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>初中GPA：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->gpa_m == "" ? "无内容" : $model->gpa_m; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($model->applicationProject == 2): ?>
                <!-- 美本 -->
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>SAT：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->sat == "" ? "无内容" : $model->sat; ?></div>
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
                                <div class="p-l-10"><?= $model->act == "" ? "无内容" : $model->act; ?></div>
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
                                <div class="p-l-10"><?= $model->gpa_h == "" ? "无内容" : $model->gpa_h; ?></div>
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
                                <div class="p-l-10"><?= $model->ap == "" ? "无内容" : $model->ap; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($model->applicationProject == 3): ?>
                <!-- 美研 -->
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>GRE：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->gre == "" ? "无内容" : $model->gre; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>GMAT：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->gmat == "" ? "无内容" : $model->gmat; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>大学GPA：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->gpa_u == "" ? "无内容" : $model->gpa_u; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>专业课GPA：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->gpa_major == "" ? "无内容" : $model->gpa_major; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($model->applicationProject == 4): ?>
                <!-- MBA/EMBA -->
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>大学GPA：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->gpa_u == "" ? "无内容" : $model->gpa_u; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>专业课GPA：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->gpa_major == "" ? "无内容" : $model->gpa_major; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <hr />
            <div class="case-edit-cont">
                <div class="row case-edit-formwidth">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-3 text-right p-r-0">
                                <b>获奖情况：</b>
                            </div>
                            <div class="col-xs-9">
                                <div class="p-l-10"><?= $model->winning != "" ? $model->winning : "暂无内容"; ?></div>
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
                                <div class="p-l-10"><?= $model->communityActivities != "" ? $model->communityActivities : "暂无内容"; ?></div>
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
                                <div class="p-l-10"><?= $model->publicBenefitActivities != "" ? $model->publicBenefitActivities : "暂无内容"; ?></div>
                                <hr class="m-t-5 m-b-0" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>