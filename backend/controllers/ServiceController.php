<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/5
 * Time: 上午1:21
 */
namespace backend\controllers;

use common\models\Expert;
use yii;
use backend\base\BaseController;
use common\models\Service;
use yii\data\Pagination;

class ServiceController extends BaseController
{
	public function actionIndex()
	{
		$query = Service::find();
		$pages = new Pagination([
			'totalCount' => $query->count(),
			'pageSize' => $this->pageSize
		]);
		$data = $query->offset($pages->offset)->limit($pages->limit)->all();
		$experts = Expert::find()->where(['status' => 2])->all();

		return $this->render("index", [
			'data' => $data,
			'pages' => $pages,
			'experts' => $experts,
		]);
	}

	public function actionAddexpert()
	{
		date_default_timezone_set("PRC");
		$gets = Yii::$app->request->get();
		$service_id = $gets['service_id'];
		$expert_id = $gets['expert_id'];
		if(!($service_id && $expert_id)){
			return json_encode([
				'code' => 20,
				'message' => '参数错误'
			]);
		}
		$updated = date("Y-m-d H:i:s");
		$model = Service::findOne($service_id);
		$model->expert_id = $expert_id;
		$model->updated_at = $updated;
		$model->status = 2;
		if($model->validate() && $model->save()){
			return json_encode([
				'code' => 200,
				'message' => '沟通成功',
				'updated' => $updated,
			]);
		}else{
			return json_encode([
				"code" => 20,
				'message' => '沟通失败',
			]);
		}
	}
}