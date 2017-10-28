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
            [['username', 'headimgurl', 'desc', 'created_at'], 'required'],
            [['desc'], 'string'],
            [['status'], 'integer'],
            [['created_at'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['headimgurl'], 'string', 'max' => 255],
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
}
