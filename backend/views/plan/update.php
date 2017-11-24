<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Plan */

use yii\widgets\ActiveForm;

$this->title = '留学规划';
?>
    <div class="col-xs-10">
        <h4 class="color-blue">留学规划 - 编辑规划方案<small class="pull-right p-t-5 p-r-15"><!-- <a href="case_new_admin.html"><span class="glyphicon glyphicon-cloud-upload"></span> 上传规划方案</a> --></small></h4>
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
                <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                <?php $i=0; ?>
                <?php foreach($schools as $key => $value): ?>
                    <?php if($value['type'] == 1): ?>
                        <?php $i++; ?>
                        <input type="hidden" name="schools[id][]" value="<?= $value['id']; ?>" >
                            <h5 class="color-blue"><?= $i==1 ? "梦想学校" : ""; ?></h5>
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
                    <?php endif; ?>
                <?php endforeach; ?>
                    <p class="col-xs-12 text-right m-b-20">
                        <a href="#" data-toggle="modal" data-target="#schools" school-type="1" plan_id="<?= $model->plan_id; ?>" class="btn btn-blue">+ 新增</a>
                    </p>
                </div>
                <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                    <?php $i=0; ?>
                    <?php foreach($schools as $key => $value): ?>
                        <?php if($value['type'] == 2): ?>
                            <?php $i++; ?>
                            <input type="hidden" name="schools[id][]" value="<?= $value['id']; ?>" >
                            <h5 class="color-blue"><?= $i == 1 ? "目标学校" : ""; ?></h5>
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
                    <p class="col-xs-12 text-right m-b-20">
                        <a href="#" data-toggle="modal" data-target="#schools" school-type="2" plan_id="<?= $model->plan_id; ?>" class="btn btn-blue">+ 新增</a>
                    </p>
                </div>
                <div class="row case-edit-formwidth p-l-0 p-r-0 case-edit-licheng">
                    <?php $i=0; ?>
                    <?php foreach($schools as $key => $value): ?>
                        <?php if($value['type'] == 3): ?>
                            <?php $i++; ?>
                            <input type="hidden" name="schools[id][]" value="<?= $value['id']; ?>" >
                            <h5 class="color-blue"><?= $i == 1 ? "保底学校" : ""; ?></h5>
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
                    <p class="col-xs-12 text-right m-b-20">
                        <a href="#" data-toggle="modal" data-target="#schools" school-type="3" plan_id="<?= $model->plan_id; ?>" class="btn btn-blue">+ 新增</a>
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
                <?php if(is_array($timePlan)): ?>
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
                <?php else: ?>
                    <?php
                        if($model->grade == "高一"){
                            $grade = 1;
                        }else if($model->grade == "高二"){
                            $grade = 2;
                        }else if($model->grade == "高三"){
                            $grade = 3;
                        }else{
                            $grade = 1;
                        }
                    ?>
                    <?php for($t=1; $t<=3; $t++): ?>
                        <?php if($grade > $t) continue; ?>
                        <input type="hidden" name="timePlan[grade][]" value="<?= $t; ?>">
                        <div class="row case-edit-formwidth">
                            <div class="col-xs-12 m-b-20" style="padding-left: 0px; margin-bottom: 0px;">
                                <div class="row case-edit-formwidth">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>时间：</b>
                                    </div>
                                    <div class="col-xs-10">
                                        <input type="text" name="timePlan[dates][]" value="" style="width: 300px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b><?= $t == 1 ? "高一" : ($t == 2 ? "高二" : "高三"); ?>：</b>
                                    </div>
                                    <div class="col-xs-10">
                                        <textarea name="timePlan[content][]" rows="" cols="" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
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

    <!-- 添加学校 -->
    <div class="modal" tabindex="-1" role="dialog" id="schools">
        <div class="modal-dialog modal-md" role="document" style="width:430px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title color-blue">新增学校</h5>
                </div>
                <div class="modal-body">
                    <div class="plan-admin-schoollist">
                        <div class="row case-edit-formwidth">
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>学校排名</b>：
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="" id="schoolRank" placeholder="请输入学校的排名" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row case-edit-formwidth">
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>SAT要求：</b>
                                    </div>
                                    <div class="col-xs-9">
                                        <input type="text" name="" id="sat" placeholder="请输入SAT要求" class="form-control" />
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
                                        <input type="text" name="" id="schoolName" placeholder="请输入学校名称" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row case-edit-formwidth">
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-xs-3 text-right p-t-5 p-r-0">
                                        <b>申请方式：</b>
                                    </div>
                                    <div class="col-xs-9">
                                        <select class="form-control" id="applyType">
                                            <option>点击选择</option>
                                            <option value="ED">ED申请</option>
                                            <option value="EA">EA申请</option>
                                            <option value="RD">RD申请</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="addSchool" class="btn btn-blue">提交</button>
                </div>
            </div>
        </div>
    </div>
<?php
$js = <<<JS
    var type = "";
    var plan_id = "";
    var user_id = '{$model->user_id}';
    $("#schools").on("show.bs.modal", function(event){
        type = $(event.relatedTarget).attr("school-type");
        plan_id = $(event.relatedTarget).attr("plan_id");
    });

    $("#addSchool").click(function(){
        var schoolRank = $("#schoolRank").val();
        var schoolName = $("#schoolName").val();
        var sat = $("#sat").val();
        var applyType = $("#applyType").val();
        var url = "/plan/addschools?type=" + type + "&user_id=" + user_id + "&plan_id=" + plan_id + "&schoolRank=" + schoolRank + "&schoolName=" + schoolName + "&sat=" + sat + "&applyType=" + applyType;
        $.get(url, function(re){
            console.log(re);
            var data = eval("(" + re + ")");
            if(data.code == 200){
                content = "添加成功";
            }else{
                content = "添加失败";
            }
            layer.open({
                title:'提示信息',
                content:content
            });
            window.location.reload();
        });

    });
JS;

$this->registerJs($js);
?>