<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;

$this->title = '专家管理';
?>
<style>
    .helper-block{
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .col-xs-9{
        height: 40px;}
</style>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> <small class="pull-right p-t-5 p-r-15"><a href="#" data-toggle="modal" data-target="#tianjiazhuanjia">+ 增加</a></small></h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <table class="table text-center admin-cont-table-col">
            <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">专家姓名</th>
                <th class="text-center">性别</th>
                <th class="text-center">头像</th>
                <th class="text-center">介绍</th>
                <th class="text-center">手机号</th>
                <th class="text-center">邮箱</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $value): ?>
                <tr>
                    <td><?= $value['expert_id'] ?></td>
                    <td><?= $value['username']; ?></td>
                    <td><?= $value['gender'] == 1 ? "男" : "女"; ?></td>
                    <td><?= Html::img($value['headimgurl'], ['width'=>30]); ?></td>
                    <td>
                        <?php if($value['desc']): ?>
                            <a href="#" data-toggle="modal" data-target="#zhuanjiajieshao_<?= $value['expert_id']; ?>">查看内容</a>
                        <?php else: ?>
                            无内容
                        <?php endif; ?>
                    </td>
                    <td><?= !empty($value['phone']) ? $value['phone'] : "无"; ?></td>
                    <td><?= !empty($value['email']) ? $value['email'] : "无"; ?></td>
                    <td>
                        <?= Html::a("编辑", ['expert/update?id=' . $value['expert_id']]); ?>
                        <span class="p-l-5 p-r-5 color-lightgray"> | </span>
                        <a href="<?= Url::to(['expert/remove?id='.$value['expert_id']]); ?>" class="color-red">删除</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <hr class="m-0" />
        <nav class="text-center">
            <?= LinkPager::widget([
                'pagination' => $pages,
            ]); ?>
        </nav>
    </div>
</div>

<?php foreach($data as $key => $value): ?>
    <div class="modal" tabindex="-1" role="dialog" id="zhuanjiajieshao_<?= $value['expert_id']; ?>">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title color-blue">专家介绍</h5>
                </div>
                <div class="modal-body">
                    <p><?= $value['desc'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- 新增 -->
<div class="modal" tabindex="-1" role="dialog" id="tianjiazhuanjia">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="width:480px; height:500px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title color-blue">添加专家</h5>
            </div>
            <div class="modal-body" style="height:380px;">
                <?php $form = ActiveForm::begin([
                    'options' => ['class' => 'form-horizontal'],
                    "method" => "post",
                    "action" => ['expert/create']
                ]); ?>
                <div class="form-group">
                    <label for="name" class="col-xs-3 control-label color-8b">姓名</label>
                    <div class="col-xs-9 p-l-5">
                        <?= $form->field($model, "username")->textInput(['class' => 'form-control', 'placeholder' => "姓名", 'style'=>["margin-left"=>"15px", "width"=>"203.5px"]])->label(false); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="xingbie" class="col-xs-3 control-label color-8b">性别</label>
                    <div class="col-xs-9 p-l-5">
                        <div class="radio radio-style">
                            <label>
                                <input type="radio" value="1" checked="checked" name="Expert[gender]"> 男
                            </label>
                            <label>
                                <input type="radio" value="2" name="Expert[gender]"> 女
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group p-t-5">
                    <label for="phone" class="col-xs-3 control-label color-8b">手机号</label>
                    <div class="col-xs-9 p-l-5">
                        <?= $form->field($model, "phone")->textInput(['class'=>'form-control','placeholder' => "手机号", 'style'=>["margin-left"=>"15px", "width"=>"203.5px"]])->label(false); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="wechat" class="col-xs-3 control-label color-8b">邮箱</label>
                    <div class="col-xs-9 p-l-5">
                        <?= $form->field($model, "email")->textInput(['class'=>'form-control','placeholder' => '邮箱地址', 'style'=>["margin-left"=>"15px", "width"=>"203.5px"]])->label(false); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="wechat" class="col-xs-3 control-label color-8b">头像</label>
                    <div class="col-xs-9 p-l-5">
                        <?= $form->field($model, "headimgurl")->fileInput(['class'=>'form-control', 'style'=>["margin-left"=>"15px", "width"=>"203.5px"]])->label(false); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="wechat" class="col-xs-3 control-label color-8b">专家介绍</label>
                    <div class="col-xs-9 p-l-5">
                        <?= $form->field($model, "desc")->textarea(['class'=>'form-control', 'rows' => 3, 'cols' => 5, 'placeholder' => '专家介绍', 'style'=>["margin-left"=>"15px", "width"=>"203.5px"]])->label(false); ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-blue add">完成</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>