<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/11/15
 * Time: 上午12:56
 */
namespace backend\models;

use yii;
use yii\base\Model;

class AddUserForm extends Model
{
	public $phone;
	public $email;

	public function rules()
	{
		return [
			[['phone', 'email'], 'required', 'message' => '{attribute}不能为空'],
			['email', 'email', 'message' => '邮箱格式不正确'],
			['phone', 'match', 'pattern' => '/^1[3|4|5|7|8]\d{9}$/', 'message' => '手机号格式不正确'],
		];
	}
}