<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午12:53
 */

namespace frontend\controllers;

use yii;
use yii\web\Controller;
use common\models\Consultation;
use yii\data\Pagination;

class ConsultationController extends Controller
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
		$model = new Consultation();
		if($model->load(Yii::$app->request->post())){
			$model->user_id = Yii::$app->user->getId();
			if($model->validate() && $model->save()){
				return $this->redirect(['consultation/pay']);
			}
		}
		return $this->render("myconsultation", [
			'model' => $model
		]);
	}

	public function actionPay()
	{
		return $this->render("pay");
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
}