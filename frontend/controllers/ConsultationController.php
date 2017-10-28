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
}