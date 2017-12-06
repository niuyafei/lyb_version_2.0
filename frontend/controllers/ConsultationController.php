<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午12:53
 */

namespace frontend\controllers;

use yii;
use frontend\base\BaseController;
use common\models\Consultation;
use yii\data\Pagination;
use common\models\Payment;

class ConsultationController extends BaseController
{
	public function actionIndex()
	{
		return $this->render("index");
	}

	/**
	 * 我要咨询
	 */
	public function actionMyconsultation()
	{
		if(!$this->isLogin()){
			return $this->redirect(["index"]);
		}
		$model = new Consultation();
		if($model->load(Yii::$app->request->post())){
			$model->user_id = Yii::$app->user->getId();
			if($model->validate() && $model->save()){
				//发送短信给超级管理员
				$to = \common\models\Admin::find()->select("phone")->where(['role' => 4])->asArray()->all();
				$to = \yii\helpers\ArrayHelper::getColumn($to, "phone");
				$to = implode(",", $to);
				$tempId = 221967;
				$data = [$model->username, date('Y'), date('m'), date('d'), date('H'), date('i'), \common\models\Consultation::dropDown('type', $model->type), $model->phone];

				$result = \common\SMS\SendSms::sendSms($to, $data, $tempId);
				return $this->redirect(['consultation/pay?consultation_id=' . $model->consultation_id]);
			}
		}
		return $this->render("myconsultation", [
			'model' => $model
		]);
	}

	public function actionPay()
	{
		if(!$this->isLogin()){
			return $this->redirect(["index"]);
		}
		$consultation_id = Yii::$app->request->get("consultation_id");
		if(!$consultation_id){
			Yii::$app->session->setFlash('error', "参数错误");
			return $this->redirect(['myconsultation']);
		}
		$user_id = Yii::$app->user->getId();
		if(Payment::find()->where(['user_id'=>$user_id, 'consultation_id'=>$consultation_id, 'payment'=>4, 'status' => 1])->exists()){
			return $this->redirect(['view']);
		}else{
			return $this->render("pay", [
				'consultation_id' => $consultation_id,
			]);
		}
	}

	public function actionView()
	{
		$user_id = Yii::$app->user->getId();
		$query = Consultation::find()->where(['user_id' => $user_id]);
		$pages = new Pagination([
			'totalCount' => $query->count(),
			'pageSize' => 10
		]);
		$data = $query->all();

		return $this->render("view", [
			'data' => $data,
			'pages' => $pages
		]);
	}

	//预约咨询评价建议
	public function actionComment($id)
	{
		$model = Consultation::findOne($id);

		return $this->render("comment", [
			'model' => $model
		]);
	}

	public function actionAddcomment()
	{
		$gets = Yii::$app->request->get();
		$id = $gets['id'];
		$comment = $gets['comment'];
		$starts = $gets['starts'];

		$model = Consultation::findOne($id);
		$model->starts = $starts;
		$model->advic = $comment;
		$model->status = 4;
		if($model->save()){
			return json_encode([
				'code' => 200,
			]);
		}else{
			return json_encode([
				'code' => 20,
			]);
		}
	}

	public function actionSuccess()
	{
		$user_id = Yii::$app->user->getId();
		if(Payment::find()->where(['user_id' => $user_id, "payment" => 4, "status" => 1])->exists()){
			return $this->render("success");
		}else{
			Yii::$app->session->setFlash('error', "请支付后再查看");
			return $this->redirect(['consultation/pay']);
		}
	}
}