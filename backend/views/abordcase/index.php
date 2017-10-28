<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\AbordCase;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AbordCaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abord Cases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="abord-case-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Abord Case', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'case_id',
            [
                'label' => '用户名',
                'attribute' => 'user_id',
                'value' => 'users.username'
            ],
            [
                'label' => '性别',
                'attribute' => 'gender',
                'value' => function($model){
                    return $model->users['gender'] == 1 ? '男' : '女';
                },
                'filter' => [1=>'男', 2=>'女'],
            ],
            'grade',
            'currentSchool',
            [
                'attribute' => 'applicationProject',
                'value' => function($model){
                    return AbordCase::dropDown('applicationProject', $model->applicationProject);
                },
                'filter' => AbordCase::dropDown('applicationProject'),
            ],
            [
                'format' => 'raw',
                'attribute' => 'status',
                'value' => function($model){
                    return Html::dropDownList('status', $model->status, AbordCase::dropDown('status'), ['class' => 'case_status', 'case_id' => $model->case_id]);
                },
                'filter' => AbordCase::dropDown('status'),
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{add-course}{view-course}{expert-comments}{view}{update}{delete}',
                'buttons' => [
                    'add-course' => function($url, $model, $key){
                        return Html::a("<span class='glyphicon glyphicon-plus'></span>", ['course/create?user_id=' . $model->user_id . "&case_id=" . $model->case_id], ['class' => 'btn btn-default btn-xs', 'title' => '添加申请历程']);
                    },
                    'view-course' => function($url, $model, $key){
                        return Html::a("<span class='glyphicon glyphicon-tasks'></span>" , ['course/index?user_id=' . $model->user_id . "&case_id=" . $model->case_id], ['class' => 'btn btn-default btn-xs', 'title' => '查看申请历程']);
                    },
                    'expert-comments' => function($url, $model, $key){
                        return Html::a("<span class='glyphicon glyphicon-user'></span>" , ['expertcomments/create?user_id=' . $model->user_id . "&case_id=" . $model->case_id], ['class' => 'btn btn-default btn-xs', 'title' => '专家点评']);
                    }
                ]
            ],
        ],
    ]); ?>
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
