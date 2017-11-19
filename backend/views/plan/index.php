<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PlanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\models\Plan;

$this->title = '留学规划';
?>
<div class="col-xs-10">
    <h4 class="color-blue">留学规划</h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <table class="table text-center admin-cont-table-col">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">性别</th>
                    <th class="text-center">申请项目</th>
                    <th class="text-center">联系电话</th>
                    <th class="text-center">邮箱地址</th>
                    <th class="text-center">付款状态</th>
                    <th class="text-center">规划方案</th>
                    <th class="text-center">管理</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['plan_id']; ?></td>
                        <td><?= $value['username']; ?></td>
                        <td><?= $value['user']['gender'] == 1 ? '男' : "女"; ?></td>
                        <td><?= Plan::dropDown($value['applicationProject']); ?></td>
                        <td><?= $value['phone'] ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= $value['pay_type']  == 1 ? "未支付" : "已支付"; ?></td>
                        <td><?= $value['status'] == 1 ? "未发布" : "已发布"; ?></td>
                        <td>
                            <a href="<?= Url::to(["plan/view?id=" . $value['plan_id']]); ?>">查看信息</a>
                            <br/>
                            <span class="color-gray"><a href="<?= Url::to(['plan/update?id=' . $value['plan_id']]); ?>">编辑方案</a></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <hr class="m-0" />
        <nav class="text-center">
            <?= LinkPager::widget([
                'pagination' => $pages
            ]); ?>
        </nav>
    </div>
</div>
