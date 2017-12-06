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
		$query = Consultation::find()->with("payment");
		$pages = new Pagination([
			'totalCount' => $query->count(),
			'pageSize' => $this->pageSize,
		]);
		$data = $query->offset($pages->offset)->limit($pages->limit)->orderBy("consultation_id desc")->all();

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
			//发短信给专家
			$expert = \common\models\Expert::findOne($expert_id);
			$to = $expert->phone;
			$tempId = 221972;
			$data = [$model->username, date('Y'), date('m'), date('d'), date('H'), date('i')];
			$result = \common\SMS\SendSms::sendSms($to, $data, $tempId);
			//发短信给用户
			$tempId = 221960;
			$data = [\common\models\Consultation::dropDown('type', $model->type),$expert->username];
			$to = $model->phone;
			$result = \common\SMS\SendSms::sendSms($to, $data, $tempId);

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
		$model->status = 3;
		if($model->save()){
			//短信
			$tempId = 221961;
			$to = $model->phone;
			$result = \common\SMS\SendSms::sendSms($to, [], $tempId);

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
			'status' => Consultation::dropDown("status", $model->status),
		];

		return json_encode($array);
	}

	public function actionChangestatus()
	{
		$gets = Yii::$app->request->get();
		$consultation_id = isset($gets['consultation_id']) ? $gets['consultation_id'] : "";
		$status = isset($gets['status']) ? $gets['status'] : "";
		$model = Consultation::findOne($consultation_id);
		if(!$model){
			return json_encode([
				'code' => 20,
				'message' => '参数错误',
			]);
		}
		if($model->status == 4){
			return json_encode([
				'code' => 20,
				'message' => '评价已完成',
			]);
		}
		$model->status = $status;
		if($model->save()){
			return json_encode(['code' => 200]);
		}else{
			return json_encode([
				'code' => 20,
				'message' => '保存失败',
			]);
		}
	}
}