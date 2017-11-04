<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_schools".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $plan_id
 * @property string $schoolName
 * @property string $schoolName_en
 * @property integer $rank
 * @property integer $type
 * @property string $sat
 * @property string $applyType
 * @property integer $status
 * @property string $created_at
 */
class Schools extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_schools';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'plan_id', 'schoolName', 'rank', 'type', 'sat', 'applyType'], 'required'],
            [['user_id', 'plan_id', 'rank', 'type', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['schoolName', 'schoolName_en'], 'string', 'max' => 100],
            [['applyType'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户id',
            'plan_id' => '留学规划id',
            'schoolName' => '学校名称',
            'schoolName_en' => '学校英文名',
            'rank' => '学校排名',
            'type' => '学校类型',
            'sat' => 'SAT最低分',
            'applyType' => '申请类型',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }

    public function creates($data, $type=1, $plan_id){
        foreach($data as $key => $value){
            $model = new self();
            $model->user_id = Yii::$app->user->getId();
            $model->plan_id = $plan_id;
            $model->schoolName = $value['schoolName'];
            $model->schoolName_en = $value['schoolName_en'];
            $model->rank = $value['schoolRanking'];
            $model->type = $type;
            $model->sat = $value['sat'];
            $model->applyType = $value['admissionType'];
            $model->created_at = date("Y-m-d H:i:s");
            $model->save();
        }
        return true;
    }
}
