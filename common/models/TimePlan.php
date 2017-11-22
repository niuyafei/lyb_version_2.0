<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_time_plan".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $plan_id
 * @property integer $grade
 * @property integer $type
 * @property string $dates
 * @property string $content
 * @property integer $status
 * @property string $created_at
 */
class TimePlan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_time_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'plan_id', 'grade', 'type', 'dates'], 'required'],
            [['user_id', 'plan_id', 'grade', 'type', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['content'], 'string'],
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
            'grade' => '年级',
            'type' => '规划类型',
            'dates' => '规划时间',
            'content' => '规划内容',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }

    public function creates($data, $plan_id){
        foreach($data as $key => $value){
            $re = $this->switchName($value['term']);
            $model = new self();
            $model->user_id = Yii::$app->user->getId();
            $model->plan_id = $plan_id;
            $model->grade = $re['grade'];
            $model->type = $re['type'];
            $model->dates = $value['startTime']. "-" .$value['endTime'];
            $array = [];
            array_map(function($item) use(&$array){
                $array[] = $item['name'];
            }, $value['process']);
            $model->content = implode("，", $array);
            $model->created_at = date("Y-m-d H:i:s");
            $model->save();
        }
        return true;
    }

    public function switchName($term)
    {
        $data = [];
        switch($term){
            case "高一 上学期":
                $data['grade'] = 1;
                $data['type'] = 1;
                break;
            case "高一 暑假":
                $data['grade'] = 1;
                $data['type'] = 2;
                break;
            case "高一 下学期":
                $data['grade'] = 1;
                $data['type'] = 3;
                break;
            case "高一 寒假":
                $data['grade'] = 1;
                $data['type'] = 4;
                break;
            case "高二 上学期":
                $data['grade'] = 2;
                $data['type'] = 1;
                break;
            case "高二 暑假":
                $data['grade'] = 2;
                $data['type'] = 2;
                break;
            case "高二 下学期":
                $data['grade'] = 2;
                $data['type'] = 3;
                break;
            case "高二 寒假":
                $data['grade'] = 2;
                $data['type'] = 4;
                break;
            case "高三 上学期":
                $data['grade'] = 3;
                $data['type'] = 1;
                break;
            case "高三 暑假":
                $data['grade'] = 3;
                $data['type'] = 2;
                break;
            case "高三 下学期":
                $data['grade'] = 3;
                $data['type'] = 3;
                break;
            case "高三 寒假":
                $data['grade'] = 3;
                $data['type'] = 4;
                break;
        }
        return $data;
    }

    public static function dropDown($column, $key)
    {
        $data = [
            'grade' => [
                '1' => '高一',
                '2' => '高二',
                '3' => '高三',
            ],
            'type' => [
                '1' => '上学期',
                '2' => '暑假',
                '3' => '下学期',
                '4' => '寒假',
            ],
        ];

        return array_key_exists($column, $data[$key]) ? $data[$key][$column] : $data[$key];
    }
}
