<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/site.css',
        '/bootstrap/css/bootstrap.css',
        "/css/style.css",
        "/bootstrap/css/dashboard.css"

    ];
    public $js = [
        '/bootstrap/js/bootstrap.min.js',
        'bootstrap/js/ie10-viewport-bug-workaround.js',
        '/js/modal-middle.js',
        '/layui/layui.all.js',
        '/bootstrap/js/bootstrap-datetimepicker.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
