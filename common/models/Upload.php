<?php
/**
 * Created by PhpStorm.
 * User: niuyafei
 * Date: 2017/10/24
 * Time: 下午10:29
 */
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Upload extends Model
{
	public $files;

	public function rules()
	{
		return [
			[['files'], 'file', 'skipOnEmpty' => false,
				'extensions' => 'jpg, png, gif',
				'mimeTypes' => 'image/jpeg, image/png,image/gif',
				'maxSize' => 1024 * 1024 * 10, 'maxFiles' => 2,
			],
		];
	}


}
