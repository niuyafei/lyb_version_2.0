<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_expert_comments".
 *
 * @property integer $comment_id
 * @property integer $user_id
 * @property integer $case_id
 * @property integer $expert_id
 * @property string $content
 * @property string $video
 * @property string $language
 * @property integer $status
 * @property string $created_at
 */
class ExpertComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_expert_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'case_id', 'expert_id', 'created_at'], 'required'],
            [['user_id', 'case_id', 'expert_id', 'status'], 'integer'],
            [['content', 'language'], 'string'],
            [['created_at'], 'safe'],
            [['video'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'ID',
            'user_id' => '用户id',
            'case_id' => '案例id',
            'expert_id' => '专家id',
            'content' => '评论内容',
            'video' => '音频文件',
            'language' => '音频语言',
            'status' => '状态',
            'created_at' => '创建时间',
        ];
    }

    public function getExpert()
    {
        return $this->hasOne(Expert::className(), ['expert_id' => 'expert_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'id']);
    }

    public function getAbordCase()
    {
        return $this->hasOne(AbordCase::className(), ['case_id' => 'case_id']);
    }
}
