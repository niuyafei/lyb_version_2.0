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
use yii\helpers\ArrayHelper;
use common\models\Schools;
use common\models\StudyPlan;
use common\models\TimePlan;

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
				$timePlanModel = new TimePlan();
				$timePlanModel->creates($data['process'], $plan_id);

//				return $this->redirect(['plan/pay']);
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