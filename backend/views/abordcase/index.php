<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\models\AbordCase;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AbordCaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '留学案例';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> <small class="pull-right p-t-5 p-r-15"><a href="<?= Url::to(['abordcase/create']); ?>">+ 增加</a></small></h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <table class="table text-center admin-cont-table-col">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">性别</th>
                    <th class="text-center">所在年级</th>
                    <th class="text-center">所在学校</th>
                    <th class="text-center">申请项目</th>
                    <th class="text-center">发布状态</th>
                    <th class="text-center">案例详情</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['case_id'] ?></td>
                        <td><?= $value['user']['nickname']; ?></td>
                        <td><?= $value['user']['gender'] == 1 ? "男" : "女"; ?></td>
                        <td><?= $value['grade']; ?></td>
                        <td><?= $value['currentSchool']; ?></td>
                        <td><?= AbordCase::dropDown('applicationProject', $value['applicationProject']); ?></td>
                        <td>
                            <select class="form-control case_status" case_id="<?= $value['case_id']; ?>" name="status">
                                <option value="1" <?= $value['status'] == 1 ? "selected" : ""; ?> >未发布</option>
                                <option value="2" <?= $value['status'] == 2 ? "selected" : ""; ?> >已发布</option>
                            </select>
                        </td>
                        <td><a href="<?= url::to(['abordcase/edit?case_id='.$value['case_id']]); ?>">编辑</a><span class="p-l-5 p-r-5 color-lightgray"> | </span><a href="<?= Url::to(['abordcase/changestatus?case_id='.$value['case_id']."&status=3"]); ?>" class="color-red">删除</a></td>
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
<?php
$js = <<<JS
    $(".case_status").change(function(){
        var status = $(this).val();
        var case_id = $(this).attr('case_id');
        window.location.href = "http://" + window.location.host + "/abordcase/changestatus?case_id=" + case_id + "&status=" + status;
    });
JS;

$this->registerJs($js);
?>
