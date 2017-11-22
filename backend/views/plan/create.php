<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Plan */

use yii\widgets\ActiveForm;

$this->title = '留学规划';
?>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> - 编辑规划方案<small class="pull-right p-t-5 p-r-15"><a href="case_new_admin.html"><span class="glyphicon glyphicon-cloud-upload"></span> 上传规划方案</a></small></h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <?php $form = ActiveForm::begin([
            'action' => ['plan/create?id='.$model->plan_id],
            'method' => 'post',
        ]); ?>
        <div class="case-edit-cont">
            <div class="row case-edit-formwidth plan-edit-width">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0 ">
                            <b>申请策略：</b>
                        </div>
                        <div class="col-xs-10">
                            <?= $form->field($studyPlan, "strategy")->textarea()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0" style="width: 100px;">
                            <b>优劣势分析：</b>
                        </div>
                        <div class="col-xs-10">
                            <?= $form->field($studyPlan, "analysis")->textarea()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0" style="width: 100px;">
                            <b>总体建议：</b>
                        </div>
                        <div class="col-xs-10">
                            <?= $form->field($studyPlan, "advice")->textarea()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="case-edit-cont">
            <h4 class="text-center m-b-20">选校列表</h4>
            <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                <h5 class="color-blue">1. 梦想学校</h5>
                <input type="hidden" name="schools[type][]" value="1" >
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>学校排名</b>：
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[rank][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>SAT要求：</b>
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[sat][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>学校名称</b>：
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[schoolName][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>申请方式：</b>
                            </div>
                            <div class="col-xs-9">
                                <select class="form-control" name="schools[applyType][]">
                                    <option value="ED">ED申请</option>
                                    <option value="EA">EA申请</option>
                                    <option value="RD">RD申请</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="col-xs-12 text-right m-b-20">
<!--                    <button type="button" class="btn btn-blue add">+ 新增</button>-->
                </p>
            </div>
            <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                <h5 class="color-blue">2. 目标学校</h5>
                <input type="hidden" name="schools[type][]" value="2" >
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>学校排名</b>：
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[rank][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>SAT要求：</b>
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[sat][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>学校名称</b>：
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[schoolName][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>申请方式：</b>
                            </div>
                            <div class="col-xs-9">
                                <select class="form-control" name="schools[applyType][]">
                                    <option value="ED">ED申请</option>
                                    <option value="EA">EA申请</option>
                                    <option value="RD">RD申请</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="col-xs-12 text-right m-b-20">
<!--                    <button type="button" class="btn btn-blue add">+ 新增</button>-->
                </p>
            </div>
            <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                <h5 class="color-blue">3. 保底学校</h5>
                <input type="hidden" name="schools[type][]" value="3" >
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>学校排名</b>：
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[rank][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>SAT要求：</b>
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[sat][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row case-edit-formwidth">
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>学校名称</b>：
                            </div>
                            <div class="col-xs-9">
                                <input type="text" name="schools[schoolName][]" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b>申请方式：</b>
                            </div>
                            <div class="col-xs-9">
                                <select class="form-control" name="schools[applyType][]">
                                    <option value="ED">ED申请</option>
                                    <option value="EA">EA申请</option>
                                    <option value="RD">RD申请</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="col-xs-12 text-right m-b-20">
<!--                    <button type="button" class="btn btn-blue add">+ 新增</button>-->
                </p>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b>推荐理由：</b>
                        </div>
                        <div class="col-xs-10">
                            <?= $form->field($studyPlan, "recommendation")->textarea()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b>选校策略：</b>
                        </div>
                        <div class="col-xs-10">
                            <?= $form->field($studyPlan, "schoolStrategy")->textarea()->label(false); ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="case-edit-cont">
            <h4 class="text-center m-b-20">时间规划</h4>
            <div class="row case-edit-formwidth">
                <input type="hidden" name="timePlan[grade][]" value="1" >
                <input type="hidden" name="timePlan[type][]" value="1" >
                <input type="hidden" name="timePlan[dates][]" value="<?= date("Y-m-d"); ?>" >
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b>高一：</b>
                        </div>
                        <div class="col-xs-10">
                            <textarea name="timePlan[content][]" rows="" cols="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <input type="hidden" name="timePlan[grade][]" value="2" >
                <input type="hidden" name="timePlan[type][]" value="1" >
                <input type="hidden" name="timePlan[dates][]" value="<?= date("Y-m-d"); ?>" >
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b>高二：</b>
                        </div>
                        <div class="col-xs-10">
                            <textarea name="timePlan[content][]" rows="" cols="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row case-edit-formwidth">
                <input type="hidden" name="timePlan[grade][]" value="3" >
                <input type="hidden" name="timePlan[type][]" value="1" >
                <input type="hidden" name="timePlan[dates][]" value="<?= date("Y-m-d"); ?>" >
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-3 text-right p-t-5 p-r-0">
                            <b>高三：</b>
                        </div>
                        <div class="col-xs-10">
                            <textarea name="timePlan[content][]" rows="" cols="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <?= Html::submitButton("生成方案", ['class' => 'btn btn-blue btn-lg p-l-20 p-r-20']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
