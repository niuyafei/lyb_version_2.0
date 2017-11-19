<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_expert".
 *
 * @property integer $expert_id
 * @property string $username
 * @property string $headimgurl
 * @property string $desc
 * @property integer $status
 * @property string $created_at
 */
class Expert extends \yii\db\ActiveRecord
{
    const STATUS_SUCCESS = 2;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_expert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'desc', 'created_at', 'gender', 'phone', 'email'], 'required', 'message' => '{attribute}不能为空'],
            [['desc', 'email', 'phone'], 'string'],
            [['status', 'gender'], 'integer'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['headimgurl'], 'string', 'max' => 255],
            ['email', 'email', 'message' => '邮箱格式不正确'],
            ['phone', 'match', 'pattern' => '/^1[3|5|7|8]\d{9}$/', 'message' => '手机格式不正确'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'expert_id' => 'ID',
            'username' => '专家名称',
            'gender' => '性别',
            'phone' => '手机号',
            'email' => '邮箱',
            'headimgurl' => '头像',
            'desc' => '介绍',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }

    public static function getExperts()
    {
        $data = self::find()->select('expert_id,username')->where(['status' => self::STATUS_SUCCESS])->asArray()->all();
        array_map(function($item) use(&$array){
            $array[$item['expert_id']] = $item['username'];
        }, $data);

        return $array;
    }

    public static function dropDown($column=null)
    {
        $data = [
            '1' => '待审核',
            '2' => '审核通过',
            '3' => '审核失败',
            '4' => '暂停服务',
        ];

        return is_null($column) ? $data : $data[$column];
    }

    public static function getExpertsById($id)
    {
        $data = self::find()->where(['expert_id' => $id])->asArray()->one();
        return $data['desc'] == "" ? "无内容" : $data['desc'];
    }
}
