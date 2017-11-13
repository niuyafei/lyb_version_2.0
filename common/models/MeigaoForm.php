<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/26
 * Time: 下午9:36
 */

namespace common\models;

use yii;
use yii\base\Model;

class MeigaoForm extends Model
{
	public $username;
	public $phone;
	public $email;
	public $currentSchool;
	public $grade;
	public $toefl;
	public $sat;

	public $plan_id;
	public $applicationProject;
	public $user_id;
	public $weixin;
	public $act;
	public $ielts;
	public $gpa_h;
	public $gpa_m;
	public $gpa_u;
	public $gpa_major;
	public $ssat;
	public $gre;
	public $gmat;
	public $ap;
	public $winning;
	public $communityActivities;
	public $publicBenefitActivities;
	public $relatives;
	public $pay_type;
	public $status;
	public $created_at;
	public $graduationSchool;
	public $major;
	public $academicActivities;
	public $workExperience;

	public function rules()
	{
		return [
			[['username', 'phone', 'email', 'currentSchool', 'grade', 'toefl', 'ssat', 'gpa_m'], 'required', 'message' => '{attribute}不能为空'],
			['username', 'string', 'length' => [2,10], 'tooShort' => '姓名不能少于2个字符', 'tooLong' => '姓名不能多于10个字符'],
			['phone', 'match', 'pattern' => '/^1[3|4|5|7|8]\d{9}$/', 'message' => '手机号格式不正确'],
			['email', 'email', 'message' => '邮箱格式不正确'],
			[['toefl', 'sat', 'act', 'ielts', 'gpa_h', 'gpa_m', 'gpa_u', 'gpa_major', 'ssat', 'gre', 'gmat', 'ap'], 'number', 'message' => '{attribute}成绩格式不正确'],
			['user_id', 'default', 'value' => Yii::$app->user->getId()],
			['applicationProject', 'default', 'value' => 1],
			[['winning', 'communityActivities', 'publicBenefitActivities', 'relatives'], 'string'],
		];
	}

	public function attributeLabels()
	{
		return [
			'plan_id' => 'ID',
			'username' => '用户名',
			'applicationProject' => '申请项目',
			'user_id' => 'UserID',
			'phone' => '手机号',
			'weixin' => '微信号',
			'email' => '邮箱',
			'currentSchool' => '就读学校',
			'grade' => '就读年级',
			'toefl' => 'TOEFL成绩',
			'sat' => 'SAT成绩',
			'act' => 'ACT成绩',
			'ielts' => '雅思成绩',
			'gpa_h' => '高中GPA成绩',
			'gpa_m' => '中学GPA成绩',
			'gpa_u' => '大学GPA成绩',
			'gpa_major' => '专业课GPA成绩',
			'ssat' => 'SSAT成绩',
			'gre' => 'GRE成绩',
			'gmat' => 'GMAT成绩',
			'ap' => 'AP成绩',
			'winning' => '获奖情况',
			'communityActivities' => '社团活动',
			'publicBenefitActivities' => '公益活动',
			'relatives' => '直系亲属是否美国大学毕业',
			'pay_type' => '付款类型',
			'status' => '状态',
			'created_at' => '创建时间',
			'graduationSchool' => '毕业学校',
			'major' => '就读专业',
			'academicActivities' => '学术活动',
			'workExperience' => '工作经历',
		];
	}

	public function updates()
	{
		$user_id = Yii::$app->user->getId();
		if(Plan::find()->where(['user_id' => $user_id])->exists()){
			$model = Plan::find()->where(['user_id' => $user_id])->one();
		}else{
			$model = new Plan();
		}

		foreach($this as $key => $value){
			$model->$key = $value;
		}

		if($model->save()){
			return true;
		}else{
			var_dump($model->getErrors());exit();
			return false;
		}
	}
}