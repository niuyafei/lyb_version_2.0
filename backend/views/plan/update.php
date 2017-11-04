<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

use yii\widgets\ActiveForm;

$this->title = '留学规划';
?>
<div class="col-xs-10">
    <h4 class="color-blue">留学规划 - 编辑规划方案<small class="pull-right p-t-5 p-r-15"><a href="case_new_admin.html"><span class="glyphicon glyphicon-cloud-upload"></span> 上传规划方案</a></small></h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <?php $form = ActiveForm::begin([
            'method' => 'post',
            'action' => ['plan/update?id='.$model->plan_id],
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
            <?php foreach($schools as $key => $value): ?>
                <?php if($value['type'] == 1): ?>
                    <input type="hidden" name="schools[id][]" value="<?= $value['id']; ?>" >
                    <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                        <h5 class="color-blue"><?= $key+1; ?>. 梦想学校</h5>
                        <div class="col-xs-12 color-gray m-b-20 p-l-20">
                            <span class="p-r-30">学校排名:<?= $value['rank']; ?></span>
                            <span class="p-r-30">学校名称:<?= $value['schoolName']; ?></span>
                            <span class="p-r-30">SAT要求:<?= $value['sat']; ?></span>
                            <span class="p-r-30">申请方式:<?= $value['applyType']; ?>申请</span>
                        </div>
                        <div class="row case-edit-formwidth">
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>学校排名</b>：
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="schools[rank][]" value="<?= $value['rank'] ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>SAT要求：</b>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="schools[sat][]" value="<?= $value['sat']; ?>" class="form-control" />
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
                                        <input type="text" name="schools[schoolName][]"  value="<?= $value['schoolName']; ?>" class="form-control" />
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
                                            <option <?= $value['applyType'] == "ED" ? "selected" : ""; ?> >ED</option>
                                            <option <?= $value['applyType'] == "EA" ? "selected" : ""; ?> >EA</option>
                                            <option <?= $value['applyType'] == "RD" ? "selected" : ""; ?> >RD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                <?php foreach($schools as $key => $value): ?>
                    <?php if($value['type'] == 2): ?>
                        <input type="hidden" name="schools[id][]" value="<?= $value['id']; ?>" >
                        <h5 class="color-blue"><?= $key+1; ?>. 目标学校</h5>
                        <div class="col-xs-12 color-gray m-b-20 p-l-20">
                            <span class="p-r-30">学校排名:<?= $value['rank']; ?></span><span class="p-r-30">学校名称:<?= $value['schoolName']; ?></span><span class="p-r-30">SAT要求:<?= $value['sat']; ?></span><span class="p-r-30">申请方式:<?= $value['applyType']; ?>申请</span>
                        </div>
                        <div class="row case-edit-formwidth">
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>学校排名</b>：
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="schools[rank][]" value="<?= $value['rank']; ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>SAT要求：</b>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="schools[sat][]" value="<?= $value['rank']; ?>" class="form-control" />
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
                                        <input type="text" name="schools[schoolName][]" value="<?= $value['schoolName']; ?>" class="form-control" />
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
                                            <option <?= $value['applyType'] == "ED" ? "selected" : ""; ?> >ED</option>
                                            <option <?= $value['applyType'] == "EA" ? "selected" : ""; ?> >EA</option>
                                            <option <?= $value['applyType'] == "RD" ? "selected" : ""; ?> >RD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                <?php foreach($schools as $key => $value): ?>
                    <?php if($value['type'] == 3): ?>
                        <input type="hidden" name="schools[id][]" value="<?= $value['id']; ?>" >
                        <h5 class="color-blue"><?= $key+1; ?>. 保底学校</h5>
                        <div class="col-xs-12 color-gray m-b-20 p-l-20">
                            <span class="p-r-30">学校排名:<?= $value['rank']; ?></span><span class="p-r-30">学校名称:<?= $value['schoolName']; ?></span><span class="p-r-30">SAT要求:<?= $value['sat']; ?></span><span class="p-r-30">申请方式:<?= $value['applyType']; ?>申请</span>
                        </div>
                        <div class="row case-edit-formwidth">
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>学校排名</b>：
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="schools[rank][]" value="<?= $value['rank']; ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>SAT要求：</b>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="schools[sat][]" value="<?= $value['sat']; ?>" class="form-control" />
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
                                        <input type="text" name="schools[schoolName][]" value="<?= $value['schoolName']; ?>" class="form-control" />
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
                                            <option <?= $value['applyType'] == "ED" ? "selected" : ""; ?> >ED</option>
                                            <option <?= $value['applyType'] == "EA" ? "selected" : ""; ?> >EA</option>
                                            <option <?= $value['applyType'] == "RD" ? "selected" : ""; ?> >RD</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
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
            <?php foreach($timePlan as $key2 => $value2): ?>
                <input type="hidden" name="timePlan[id][]" value="<?= $value2['id'] ?>" >
                <div class="row case-edit-formwidth">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-3 text-right p-t-5 p-r-0">
                                <b><?= $value2['grade'] == 1 ? "高一" : ($value2['grade'] == 2 ? "高二" : "高三"); ?>(<?php
                                    if($value2['type'] == 1) echo "上学期";
                                    if($value2['type'] == 2) echo "暑假";
                                    if($value2['type'] == 3) echo "下学期";
                                    if($value2['type'] == 4) echo "寒假";
                                ?>)：</b>
                            </div>
                            <div class="col-xs-10">
                                <textarea name="timePlan[content][]" rows="" cols="" class="form-control"><?= str_replace("，", "\r\n", $value2['content']); ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr />
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <?= Html::submitButton("更新方案", ['class' => 'btn btn-blue btn-lg p-l-20 p-r-20']); ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
