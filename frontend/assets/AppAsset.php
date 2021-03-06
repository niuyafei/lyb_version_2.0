<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'bootstrap/css/dashboard.css',
        'bootstrap/css/bootstrapDatepickr-1.0.0.css',
    ];
    public $js = [
        'bootstrap/js/bootstrapDatepickr-1.0.0.js',
        'bootstrap/js/ie-emulation-modes-warning.js',
        'bootstrap/js/bootstrap.js',
        'bootstrap/js/modal-middle.js',
        'lib/jquery.raty.min.js',
        '/layui/layui.all.js',
        'bootstrap/js/bootstrap-datetimepicker.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
