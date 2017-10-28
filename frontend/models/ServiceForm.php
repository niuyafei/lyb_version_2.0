<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/28
 * Time: 上午10:57
 */
namespace frontend\models;

use yii;
use yii\base\Model;

class ServiceForm extends Model
{
	public $username;
	public $phone;

	public function rules()
	{
		return [
			[['username', 'phone'], 'required', 'message' => '{attribute}不能为空'],
			['username', 'string', 'length' => [2,10], 'tooShort' => '姓名不能低于2个字符', 'tooLong' => '姓名不能超过10个字符'],
			['phone', 'match', 'pattern' => '/^1[3578]\d{9}$/', 'message' => '手机号码不正确'],
		];
	}

	public function attributeLabels()
	{
		return [
			'username' => '用户名',
			'phone' => '手机号',
		];
	}
}