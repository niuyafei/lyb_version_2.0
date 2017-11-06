<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "collegenode_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property integer $gender
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $nickname
 * @property string $unionId
 * @property string $openId
 * @property string $headImgUrl
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash'], 'required'],
            [['gender', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'nickname', 'unionId', 'openId', 'headImgUrl'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['nickname'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'gender' => 'Gender',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'nickname' => 'Nickname',
            'unionId' => 'Union ID',
            'openId' => 'Open ID',
            'headImgUrl' => 'Head Img Url',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
