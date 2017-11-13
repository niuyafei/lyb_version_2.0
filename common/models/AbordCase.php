<?php

namespace common\models;

use Yii;
use common\models\User;
use common\models\Course;
use common\models\Payment;

/**
 * This is the model class for table "collegenode_abord_case".
 *
 * @property integer $case_id
 * @property integer $user_id
 * @property string $grade
 * @property string $currentSchool
 * @property integer $applicationProject
 * @property integer $status
 * @property string $admissionSchool
 * @property string $admissionMajor
 * @property string $specialty
 * @property string $winning
 * @property string $sat
 * @property string $toefl
 * @property string $act
 * @property string $gpa
 * @property string $ielts
 * @property string $created_at
 */
class AbordCase extends \yii\db\ActiveRecord
{
    const STATUS_RELEASE = 2;
    const STATUS_UNPUBLISHED = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_abord_case';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'grade', 'currentSchool', 'admissionSchool', 'applicationProject'], 'required', 'message' => '{attribute}不能为空'],
            [['user_id', 'applicationProject', 'status', 'gender'], 'integer'],
            [['specialty', 'winning'], 'string'],
            [['created_at'], 'safe'],
            [['username', 'grade', 'currentSchool'], 'string', 'max' => 50],
            [['admissionSchool', 'admissionMajor'], 'string', 'max' => 255],
            [['sat', 'ielts'], 'string', 'max' => 5],
            [['act'], 'string', 'max' => 3],
            [['gpa'], 'string', 'max' => 2],
            ['toefl', "integer", "max"=>'120', "message"=>"TOEFL成绩不能大于120分"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'case_id' => '案例id',
            'user_id' => '用户id',
            'username' => '姓名',
            'gender' => '性别',
            'grade' => '年级',
            'currentSchool' => '就读学校',
            'applicationProject' => '申请项目',
            'status' => '发布状态',
            'admissionSchool' => '录取学校',
            'admissionMajor' => '录取专业',
            'specialty' => '特长',
            'winning' => '所获奖项',
            'sat' => 'SAT成绩',
            'toefl' => 'TOEFL成绩',
            'act' => 'ACT成绩',
            'gpa' => 'GPA成绩',
            'ielts' => '雅思成绩',
        ];
    }

    public static function dropDown ($column, $value = null)
    {
        $dropDownList = [
            'status'=> [
                '1'=>'未发布',
                '2'=>'已发布',
            ],
            'applicationProject'=> [
                '1'=>'美高',
                '2'=>'美本',
                '3'=>'美研',
                '4'=>'MBA/EMBA'
            ],
        ];
        if ($value !== null){
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column][$value] : false;
        }else{
            return array_key_exists($column, $dropDownList) ? $dropDownList[$column] : false;
        }
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getCourse()
    {
        return $this->hasMany(Course::className(), ['case_id' => 'case_id']);
    }

    public function getExpertComments()
    {
        return $this->hasOne(ExpertComments::className(), ['case_id' => 'case_id']);
    }

    public function getPayment()
    {
        return $this->hasMany(Payment::className(), ['case_id' => 'case_id']);
    }
}
