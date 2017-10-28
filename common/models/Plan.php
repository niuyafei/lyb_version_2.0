<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_plan".
 *
 * @property integer $plan_id
 * @property string $username
 * @property integer $applicationProject
 * @property integer $user_id
 * @property string $phone
 * @property string $weixin
 * @property string $email
 * @property string $currentSchool
 * @property string $grade
 * @property string $graduationSchool
 * @property string $major
 * @property string $toefl
 * @property string $sat
 * @property string $act
 * @property string $ielts
 * @property string $gpa_h
 * @property string $gpa_m
 * @property string $gpa_u
 * @property string $gpa_major
 * @property string $ssat
 * @property string $gre
 * @property string $gmat
 * @property string $ap
 * @property string $winning
 * @property string $communityActivities
 * @property string $publicBenefitActivities
 * @property string $relatives
 * @property string $academicActivities
 * @property integer $pay_type
 * @property integer $status
 * @property string $workExperience
 * @property string $created_at
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'applicationProject', 'user_id', 'phone', 'email', 'toefl'], 'required'],
            [['applicationProject', 'user_id', 'pay_type', 'status'], 'integer'],
            [['winning', 'communityActivities', 'publicBenefitActivities', 'relatives', 'academicActivities'], 'string'],
            [['created_at'], 'safe'],
            [['username', 'weixin', 'email', 'currentSchool', 'grade', 'graduationSchool'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 11],
            [['major', 'workExperience'], 'string', 'max' => 255],
            [['toefl', 'act', 'ielts'], 'string', 'max' => 3],
            [['sat', 'ssat', 'gre', 'gmat'], 'string', 'max' => 4],
            [['gpa_h', 'gpa_m', 'gpa_u', 'gpa_major', 'ap'], 'string', 'max' => 2],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['pay_type', 'default', 'value' => 1],
            ['status', 'default', 'value' => 1],
            ['created_at', 'default', 'value' => date("Y-m-d H:i:s")],
        ];
    }

    /**
     * @inheritdoc
     */
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
}
