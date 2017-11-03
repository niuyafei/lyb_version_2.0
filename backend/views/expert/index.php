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
                <th class="text-center">头像</th>
                <th class="text-center">介绍</th>
                <th class="text-center">状态</th>
                <th class="text-center">创建时间</th>
                <th class="text-center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($data as $key => $value): ?>
                <tr>
                    <td><?= $value['expert_id'] ?></td>
                    <td><?= $value['username']; ?></td>
                    <td><?= Html::img($value['headimgurl'], ['width'=>50, "height"=>50]); ?></td>
                    <td><?= $value['desc']; ?></td>
                    <td><?= \common\models\Expert::dropDown($value['status']); ?></td>
                    <td><?= $value['created_at']; ?></td>
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
