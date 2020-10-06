<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

class FormWizard extends AssetBundle
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
        "plugins/bootstrap-wizard/jquery.bootstrap.wizard.js",
        "plugins/jquery-validation/dist/jquery.validate.min.js",
        "../js/form-wizard.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',

        'yii\bootstrap4\BootstrapAsset',
    ];
}
