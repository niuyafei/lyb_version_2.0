<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = '专家管理';
?>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> <small class="pull-right p-t-5 p-r-15"><a href="<?= Url::to(['expert/create']); ?>">+ 增加</a></small></h4>
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
                <th class="text-center">状态</th>
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
                    <td><?= \common\models\Expert::dropDown($value['status']); ?></td>
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
