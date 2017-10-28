<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_consultation".
 *
 * @property integer $consultation_id
 * @property integer $user_id
 * @property string $username
 * @property integer $gender
 * @property string $phone
 * @property integer $type
 * @property string $others
 * @property string $dates
 * @property string $times
 * @property string $cost
 * @property integer $pay_type
 * @property integer $status
 * @property integer $admin_id
 * @property string $communicationRecord
 * @property integer $starts
 * @property string $advic
 * @property string $created_at
 */
class Consultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_consultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'username', 'phone', 'type', 'others', 'dates', 'times', 'cost'], 'required', 'message' => '{attribute}不能为空'],
            [['user_id', 'gender', 'type', 'pay_type', 'status', 'admin_id', 'starts'], 'integer'],
            [['others', 'communicationRecord', 'advic'], 'string'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 11],
            [['times'], 'string', 'max' => 13],
            ['dates', 'match', 'pattern' => '/^201[789]-(0\d{1}|1[012])-([012]\d{1}|3[01])$/', 'message' => '预约日期格式不正确'],
//            [['dates'], 'date', 'message' => '格式不正确'],
            [['cost'], 'string', 'max' => 4],
            ['created_at', 'default', 'value' => date('Y-m-d H:i:s')],
            ['others', 'string', 'max' => 100, 'tooLong' => '最多可以输入100个字符'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'consultation_id' => 'ID',
            'user_id' => '用户id',
            'username' => '用户名',
            'gender' => '性别',
            'phone' => '手机号',
            'type' => '预约类型',
            'others' => '其他内容',
            'dates' => '预约日期',
            'times' => '预约时间',
            'cost' => '预约费用',
            'pay_type' => '支付类型',
            'status' => '支付状态',
            'admin_id' => '管理员id',
            'communicationRecord' => '沟通记录',
            'starts' => '服务评级',
            'advic' => '相关建议',
            'created_at' => '创建时间',
        ];
    }
}
