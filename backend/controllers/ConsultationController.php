<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/5
 * Time: 上午2:15
 */
namespace backend\controllers;

use common\models\Consultation;
use yii;
use backend\base\BaseController;
use yii\data\Pagination;

class ConsultationController extends BaseController
{
	public function actionIndex()
	{
		$query = Consultation::find();
		$pages = new Pagination([
			'totalCount' => $query->count(),
			'pageSize' => $this->pageSize,
		]);
		$data = $query->offset($pages->offset)->limit($pages->limit)->all();

		return $this->render("index", [
			'data' => $data,
			'pages' => $pages
		]);
	}

	//选择专家
	public function actionAddexpert()
	{
		$gets = Yii::$app->request->get();
		$expert_id = $gets['expert_id'];
		$consultation_id = $gets['consultation_id'];
		$model = Consultation::findOne($consultation_id);
		$model->admin_id = $expert_id;
		if($model->save()){
			return json_encode([
				'code' => 200,
				'message' => '保存成功'
			]);
		}else{
			return json_encode([
				'code' => 20,
				'message' => '保存失败'
			]);
		}
	}

	//完成沟通
	public function actionAddrecord()
	{
		$gets = Yii::$app->request->get();
		$consultation_id = $gets['consultation_id'];
		$record = $gets['record'];
		$model = Consultation::findOne($consultation_id);
		$model->communicationRecord = $record;
		if($model->save()){
			return json_encode([
				'code' => 200,
				'message' => '保存成功'
			]);
		}else{
			return json_encode([
				'code' => 20,
				'message' => '保存失败'
			]);
		}
	}

	public function actionGetmodelbyid()
	{
		$gets = Yii::$app->request->get();
		$consultation_id = $gets['consultation_id'];
		$model = Consultation::findOne($consultation_id);
		$array = [
			'expert_username' => $model->expert->username,
			'communicationRecord' => $model->communicationRecord,
		];

		return json_encode($array);
	}
}