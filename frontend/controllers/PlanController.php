<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/25
 * Time: 下午11:23
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Plan;
use common\models\MeibenForm;
use common\models\MeigaoForm;
use common\models\MeiyanForm;
use common\models\MeimbaForm;

class PlanController extends Controller
{
	public function actionIndex()
	{
		return $this->render("index");
	}

	//申请留学规划
	public function actionEdit()
	{
		$model = new Plan();
		if(Yii::$app->request->post()){
			if(Plan::find()->where(['user_id'=>Yii::$app->user->getId()])->exists()){
				$model = Plan::find()->where(['user_id'=>Yii::$app->user->getId()])->one();
			}
			if($model->load(Yii::$app->request->post()) && $model->save()){
				return $this->redirect(['plan/pay']);
			}
		}
		return $this->render("edit", [
			'model' => $model
		]);
	}

	//支付
	public function actionPay()
	{
		return $this->render("pay");
	}

	//查看留学规划
	public function actionView()
	{

	}

	public function actionMeigao()
	{
		$model = new MeigaoForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			if($model->updates()){
				return $this->redirect(['plan/pay']);
			}
		}
		return $this->render("meigao", [
			'model' => $model
		]);
	}

	public function actionMeiben()
	{
		$model = new MeibenForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			if($model->updates()){
				return $this->redirect(['plan/pay']);
			}
		}
		return $this->render("meiben", [
			'model' => $model
		]);

	}

	public function actionMeiyan()
	{
		$model = new MeiyanForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			if($model->updates()){
				return $this->redirect(['plan/pay']);
			}
		}
		return $this->render("meiyan", [
			'model' => $model
		]);
	}

	public function actionEmba()
	{
		$model = new MeimbaForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			if($model->updates()){
				return $this->redirect(['plan/pay']);
			}
		}
		return $this->render("emba", [
			'model' => $model
		]);
	}
}