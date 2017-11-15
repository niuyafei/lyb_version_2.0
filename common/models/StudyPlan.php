<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_studyPlan".
 *
 * @property integer $study_id
 * @property integer $plan_id
 * @property integer $user_id
 * @property string $strategy
 * @property string $analysis
 * @property string $advice
 * @property string $recommendation
 * @property string $schoolStrategy
 * @property integer $status
 * @property string $created_at
 */
class StudyPlan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_studyPlan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_id', 'user_id'], 'required'],
            [['plan_id', 'user_id', 'status'], 'integer'],
            [['strategy', 'analysis', 'advice', 'recommendation', 'schoolStrategy'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'study_id' => 'Study ID',
            'plan_id' => '留学规划id',
            'user_id' => '用户id',
            'strategy' => '申请策略',
            'analysis' => '优劣势分析',
            'advice' => '总体建议',
            'recommendation' => '推荐理由',
            'schoolStrategy' => '选校策略',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }

    public function creates($data, $plan_id)
    {
        if(is_array($data)){
            $model = new self();
            $model-> plan_id = $plan_id;
            $model->user_id = Yii::$app->user->getId();
            $model->strategy = isset($data['sqcl']) ? $data['sqcl'] : "";
            $ylsfx = isset($data['ylsfx']) ? implode("-*-", $data['ylsfx']) : "";
            $model->analysis = $ylsfx;
            $model->advice = isset($data['ztjy']) ? $data['ztjy'] : "";
            $tjly = isset($data['tjly']) ? implode("-*-", $data['tjly']) : "";
            $model->recommendation = $tjly;
            $model->schoolStrategy = isset($data['xxcl']) ? $data['xxcl'] : "";
            $model->created_at = date("Y-m-d H:i:s");
            if($model->save()){
                return true;
            }else{
                return false;
            }
        }
    }
}
