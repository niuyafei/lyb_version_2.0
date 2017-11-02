<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = '账号管理';
?>
<div class="col-xs-10">
    <h4 class="color-blue"><?= $this->title; ?> <small class="pull-right p-t-5 p-r-15"><a href="#" data-toggle="modal" data-target="#tianjiazhanghao">+ 增加</a></small></h4>
    <hr class="m-t-5" />
    <div class="p-20 p-t-0">
        <table class="table text-center admin-cont-table-col">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">姓名</th>
                    <th class="text-center">性别</th>
                    <th class="text-center">级别</th>
                    <th class="text-center">手机号</th>
                    <th class="text-center">邮箱</th>
                    <th class="text-center">管理</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['nickname']; ?></td>
                        <td><?= $value['gender'] == 1 ? "男" : "女"; ?></td>
                        <td><?= \backend\models\Admin::dropDown($value['role']); ?></td>
                        <td><?= $value['phone']; ?></td>
                        <td><?= $value['username']; ?></td>
                        <td>
                            <span class="color-gray"><?= Html::a("编辑", "#", ["data-target" => "#edit_".$value['id'], 'data-toggle' => "modal"]); ?></span><span class="p-l-5 p-r-5 color-lightgray"> | </span>
                            <span class="color-gray"><?= Html::a("删除", ['admin/delete', 'id'=>$value['id']], ['onclick' => "if(confirm('确定删除吗？') == false) return false;"]); ?></span>
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
<!-- 新增 -->
<div class="modal" tabindex="-1" role="dialog" id="tianjiazhanghao">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title color-blue">账号添加</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="name" class="col-xs-3 control-label color-8b">姓名</label>
                        <div class="col-xs-9 p-l-5">
                            <input type="text" class="form-control" name="nickname" placeholder="姓名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="xingbie" class="col-xs-3 control-label color-8b">性别</label>
                        <div class="col-xs-9 p-l-5">
                            <div class="radio radio-style">
                                <label>
                                    <input type="radio" value="1" checked="checked" name="gender"> 男
                                </label>
                                <label>
                                    <input type="radio" value="2" name="gemder"> 女
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group p-t-5">
                        <label for="phone" class="col-xs-3 control-label color-8b">手机号</label>
                        <div class="col-xs-9 p-l-5">
                            <input type="text" class="form-control" name="phone" placeholder="手机号">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wechat" class="col-xs-3 control-label color-8b">邮箱</label>
                        <div class="col-xs-9 p-l-5">
                            <input type="text" class="form-control" name="email" placeholder="邮箱地址">
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-blue add">完成</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($data as $key => $value): ?>
    <div class="modal" tabindex="-1" role="dialog" id="edit_<?= $value['id'] ?>">
        <input type="hidden" name="id" value="<?= $value['id']; ?>" >
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title color-blue">账号编辑</h5>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-xs-3 control-label color-8b">姓名</label>
                            <div class="col-xs-9 p-l-5">
                                <input type="text" name="nickname" class="form-control" id="name" placeholder="姓名" value="<?= $value['nickname'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="xingbie" class="col-xs-3 control-label color-8b">性别</label>
                            <div class="col-xs-9 p-l-5">
                                <div class="radio radio-style">
                                    <label>
                                        <input type="radio" value="1" <?= $value['gender'] == 1 ? "checked" : ""; ?> name="gender"> 男
                                    </label>
                                    <label>
                                        <input type="radio" value="2" <?= $value['gender'] == 2 ? "checked" : ""; ?> name="gender"> 女
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group p-t-5">
                            <label for="phone" class="col-xs-3 control-label color-8b">手机号</label>
                            <div class="col-xs-9 p-l-5">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="手机号" value="<?= $value['phone']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="wechat" class="col-xs-3 control-label color-8b">邮箱</label>
                            <div class="col-xs-9 p-l-5">
                                <input type="text" name="email" class="form-control" id="wechat" placeholder="邮箱地址" value="<?= $value['email'] ?>">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-blue edit">完成</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php
$js = <<<JS
    url = "http://" + document.domain;
    $(".edit[type='button']").click(function(){
        url = url + "/admin/edit";
        var id = $(this).parents(".modal").find("input[name='id']").val();
        var nickname = $(this).parents(".modal").find("input[name='nickname']").val();
        var gender = $(this).parents(".modal").find("input[type='radio']:checked").val();
        var phone = $(this).parents(".modal").find("input[name='phone']").val();
        var email = $(this).parents(".modal").find("input[name='email']").val();
        window.location.href = url+"?id="+id+"&nickname="+nickname+"&gender="+gender+"&phone="+phone+"&email="+email;
    });

    $(".add[type='button']").click(function(){
        url = url + "/admin/add";
        var nickname = $(this).parents(".modal").find("input[name='nickname']").val();
        var gender = $(this).parents(".modal").find("input[type='radio']:checked").val();
        var phone = $(this).parents(".modal").find("input[name='phone']").val();
        var email = $(this).parents(".modal").find("input[name='email']").val();
        window.location.href = url+"?nickname="+nickname+"&gender="+gender+"&phone="+phone+"&email="+email;
    });
JS;

$this->registerJs($js);
?>