<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/7
 * Time: 上午12:25
 */
use yii\widgets\LinkPager;

$this->title = "我的咨询";
?>
<div class="container">
	<h2 class="text-center m-t-30">我的咨询</h2>
	<hr class="cont-tit-border" />
	<div class="border-color p-20 p-b-0 ">
		<table class="table">
			<thead>
			<tr>
				<th width="80" class="text-center">ID</th>
				<th width="100" class="text-center">预约内容</th>
				<th width="120" class="text-center">预约日期</th>
				<th width="120" class="text-center">预约时间</th>
				<th width="100" class="text-center">其他需求</th>
				<th width="100" class="text-center">状态</th>
				<th width="100" class="text-center">操作</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach($data as $key => $value): ?>
				<tr>
					<td class="text-center"><?= $key+1; ?></td>
					<td class="text-center"><?= \common\models\Consultation::dropDown("type", $value['type']); ?></td>
					<td class="text-center"><?= $value['dates']; ?></td>
					<td class="text-center"><?= $value['times']; ?></td>
					<td class="text-center">
						<a href="" data-toggle="modal" data-target="#qitaxuqiu_<?= $value['consultation_id'] ?>">查看</a>
					</td class="text-center">
					<td class="text-center">
						<span class="color-red"><?= \common\models\Consultation::dropDown("status", $value['status']) ?></span>
					</td>
					<td class="text-center">
						<?php if($value['status'] == 3): ?>
							<a href="/consultation/comment?id=<?= $value['consultation_id']; ?>">点击评价</a>
						<?php elseif($value['status'] == 4): ?>
							<a href="#" data-toggle="modal" data-target="#chakanpingjia_<?= $value['consultation_id']; ?>">查看评价</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

	</div>
	<div class="text-center">
		<?= LinkPager::widget([
			'pagination' => $pages
		]); ?>
	</div>
</div>


<?php foreach($data as $k => $v): ?>
<div class="modal" tabindex="-1" role="dialog" id="qitaxuqiu_<?= $v['consultation_id']; ?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title color-blue">其他需求</h4>
			</div>
			<div class="modal-body p-40 p-t-20">
				<p><?= !empty($v['others']) ? $v['others'] : "无内容"; ?></p>
			</div>

		</div>
	</div>
</div>
<?php endforeach; ?>


<?php foreach($data as $k2 => $v2): ?>
	<div class="modal" tabindex="-1" role="dialog" id="chakanpingjia_<?= $v2['consultation_id']; ?>">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title color-blue">查看评价</h4>
				</div>
				<div class="modal-body p-40 p-t-20">
					<div class="row">
						<div class="col-xs-2 color-gray">
							星级评价
						</div>
						<div class="col-xs-10 p-l-0">
							<div id="space-demo" class="target-demo">
								<?php for($i=1; $i<=5; $i++): ?>
									<?php if($i<= $v2['starts']): ?>
										<img src="/lib/img/star-on.png">
									<?php else: ?>
										<img src="/lib/img/star-off.png">
									<?php endif; ?>
								<?php endfor; ?>
								<input type="hidden" name="score" value="<?= $v2['starts']; ?>">
							</div>
						</div>
					</div>
					<div class="row m-t-30">
						<div class="col-xs-2 color-gray">
							相关建议
						</div>
						<div class="col-xs-10 p-l-0">
							<p><?= !is_null($v2['advic']) ? $v2['advic'] : "无内容"; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>