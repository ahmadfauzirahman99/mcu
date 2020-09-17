<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class Xeditable extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/theme';
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $css = [
        // // "css/bootstrap.min.css",
        // "css/icons.css",
        // "css/style.css",

        // "js/modernizr.min.js"
    ];
    public $js = [
        "plugins/moment/moment.js",
        "plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js",
        "../js/x-editable.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',

        'yii\bootstrap4\BootstrapAsset',
    ];
}
