<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_service".
 *
 * @property integer $service_id
 * @property integer $user_id
 * @property string $username
 * @property string $phone
 * @property integer $type
 * @property integer $status
 * @property string $created_at
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'username', 'phone', 'type', 'created_at'], 'required'],
            [['user_id', 'type', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 10],
            [['phone'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'service_id' => 'Service ID',
            'user_id' => '用户id',
            'username' => '姓名',
            'phone' => '手机号',
            'type' => '预约类型',
            'status' => '预约状态',
            'expert_id' => '沟通专家',
            'updated_at' => '沟通时间',
            'created_at' => '预约时间',
        ];
    }

    public static function dropDown($column = null)
    {
//        1=》背景提升，2-》面试特训，3-》夏校项目，4-》实习项目',
        $data = [
            '1' => '背景提升',
            '2' => '面试特训',
            '3' => '夏校项目',
            '4' => '实习项目',
        ];

        return array_key_exists($column, $data) ? $data[$column] : $data;
    }
}
