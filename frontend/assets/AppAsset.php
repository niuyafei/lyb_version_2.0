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
        'bootstrap/css/dashboard.css'
    ];
    public $js = [
        'bootstrap/js/ie-emulation-modes-warning.js',
        'bootstrap/js/bootstrap.js',
        'bootstrap/js/modal-middle.js',
        'lib/jquery.raty.min.js'

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
