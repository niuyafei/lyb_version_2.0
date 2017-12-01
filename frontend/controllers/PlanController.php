<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/25
 * Time: 下午11:23
 */
namespace frontend\controllers;

use Yii;
use frontend\base\BaseController;
use common\models\Plan;
use common\models\MeibenForm;
use common\models\MeigaoForm;
use common\models\MeiyanForm;
use common\models\MeimbaForm;
use yii\helpers\ArrayHelper;
use common\models\Schools;
use common\models\StudyPlan;
use common\models\TimePlan;
use common\models\Payment;

class PlanController extends BaseController
{
	public function actionIndex()
	{
		return $this->render("index");
	}

	//申请留学规划
	public function actionEdit()
	{
		if(!$this->isLogin()){
			return $this->redirect(['plan/index']);
		}
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
		$user_id = Yii::$app->user->getId();
		if(Plan::find()->where(['user_id' => $user_id, 'pay_type' => 2])->exists()){
			return $this->redirect(['plan/view']);
		}else{
			return $this->render("pay");
		}
	}

	//查看留学规划
	public function actionView()
	{
		if(!$this->isLogin()){
			return $this->redirect(['plan/index']);
		}
		$user_id = Yii::$app->user->getId();
		$model = Plan::find()->where(['status' => Plan::STATUS_RELEASE, 'user_id' => $user_id])->one();

		if($model){
			return $this->render("view", [
				'model' => $model
			]);
		}else{
			Yii::$app->session->setFlash("error", "您还没有方案");
			return $this->redirect(['site/index']);
		}
	}

	public function actionMeigao()
	{
		if(!$this->isLogin()){
			return $this->redirect(['plan/index']);
		}
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
		if(!$this->isLogin()){
			return $this->redirect(['plan/index']);
		}
		$model = new MeibenForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$toefl = ArrayHelper::getValue($model, "toefl");
			$grade = ArrayHelper::getValue($model, "grade");
			if($grade == "高一"){
				$grade = 10;
			}else if($grade == "高二"){
				$grade = 11;
			}else{
				$grade = 12;
			}
			$sat = ArrayHelper::getValue($model, "sat");
			$currentSchool = ArrayHelper::getValue($model, 'currentSchool');
			$act = ArrayHelper::getValue($model, 'act');
			$gpa = ArrayHelper::getValue($model, "gpa_h");
			$ap = ArrayHelper::getValue($model, "ap");
			$ielts = ArrayHelper::getValue($model, "ielts");

			if(!$toefl && $ielts){
				//有雅思成绩没有toefl成绩
				$toefl = ceil($ielts/9*120);
			}
			if(!$sat && $act){
				$sat = ceil($act/36*2400);
			}
			$gpa = ceil($gpa*100) / 100;

			//新SAT成绩换算
			if($sat <= 1600){
				$sat = ceil($sat/1600 * 2400);
			}
			$url = "http://fn.liuyangbang.cn/frontend/web/index.php?r=scheme/selectiontable&toefl={$toefl}&sat={$sat}&grade={$grade}&currentSchool={$currentSchool}&act={$act}&gpa={$gpa}&ap={$ap}";
			$content = file_get_contents($url);
			$data = json_decode($content, true);

			if($plan_id = $model->updates()){
				//选校列表
				$SchoolModel = new Schools();
				$SchoolModel->creates($data['dream'], 1, $plan_id);
				$SchoolModel->creates($data['goal'], 2, $plan_id);
				$SchoolModel->creates($data['end'], 3, $plan_id);
				//选校策略
				$studyPlanModel = new StudyPlan();
				$studyPlanModel->creates($data, $plan_id);
				//时间规划
				if(isset($data['process'])){
					$timePlanModel = new TimePlan();
					$timePlanModel->creates($data['process'], $plan_id);
				}

				return $this->redirect(['plan/pay']);
			}else{
				Yii::$app->session->setFlash('error', "保存失败");
				return $this->redirect(['meiben']);
			}
		}
		return $this->render("meiben", [
			'model' => $model
		]);

	}

	public function actionMeiyan()
	{
		if(!$this->isLogin()){
			return $this->redirect(['plan/index']);
		}
		$model = new MeiyanForm();
		if($model->load(Yii::$app->request->post()) && $model->validate()){
			$model->winning = $_POST['MeiyanForm']['winning'];
			$model->communityActivities = $_POST['MeiyanForm']['communityActivities'];
			$model->publicBenefitActivities = $_POST['MeiyanForm']['publicBenefitActivities'];
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
		if(!$this->isLogin()){
			return $this->redirect(['plan/index']);
		}
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

	public function actionResult()
	{
		Yii::$app->session->setFlash('success', "支付成功，方案审核后才可以查看呦！");
		return $this->redirect(['site/index']);
	}
}