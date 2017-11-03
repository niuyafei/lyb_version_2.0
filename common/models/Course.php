<?php

namespace common\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "collegenode_course".
 *
 * @property integer $course_id
 * @property integer $case_id
 * @property integer $user_id
 * @property integer $type
 * @property string $dates
 * @property string $content
 * @property integer $status
 * @property integer $state
 * @property string $created_at
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['case_id', 'user_id', 'type', 'dates', 'content', 'created_at'], 'required'],
            [['case_id', 'user_id', 'type', 'status', 'state'], 'integer'],
            [['dates', 'created_at'], 'safe'],
            [['content'], 'string'],
            ['created_at', 'default', 'value' => date('Y-m-d H:i:s')],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'user_id' => '用户id',
            'case_id' => '案例id',
            'type' => '申请类型',
            'dates' => '申请时间',
            'content' => '内容',
            'status' => '状态',
            'state' => '进度',
            'created_at' => '申请时间',
        ];
    }

    public static function dropDown($value=null)
    {
        $dropDownList = [
            '1' => '规划方案',
            '2' => '签订协议',
            '3' => '申校名单',
            '4' => '关键支持',
            '5' => '网申结果'
        ];

        if ($value !== null){
            return isset($dropDownList[$value]) ? $dropDownList[$value] : false;
        }else{
            return $dropDownList;
        }
    }

    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
