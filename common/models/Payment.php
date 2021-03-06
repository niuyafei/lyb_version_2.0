<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collegenode_payment".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $case_id
 * @property integer $pay_type
 * @property integer $payment
 * @property integer $status
 * @property string $created_at
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collegenode_payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'payment', 'status', 'order_id', 'amount', 'created_at'], 'required'],
            [['user_id', 'case_id', 'consultation_id', 'pay_type', 'payment', 'status'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'case_id' => 'Case ID',
            'order_id' => '订单号',
            'consultation_id' => '预约咨询id',
            'pay_from' => '支付渠道',
            'amount' => '支付金额',
            'pay_type' => 'Pay Type',
            'payment' => 'Payment',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public static function isPayment($column, $id, $user_id)
    {
        if(self::find()->where([$column => $id, 'user_id' => $user_id, 'status' => 1])->exists()){
            return true;
        }else{
            return false;
        }
    }
}
