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
            'user_id' => 'User ID',
            'username' => 'Username',
            'phone' => 'Phone',
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
