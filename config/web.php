<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$dbRegisterMcu = require __DIR__ . '/dbRegisterMcu.php';

$config = [
    'id' => 'basic',
    'language' => 'id-ID',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Jakarta',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'sso',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'user' => [
        //     'identityClass' => 'app\models\User',
        //     'enableAutoLogin' => true,
        // ],
        'user' => [
            'class' => 'app\models\User',
            'identityClass' => 'app\models\Identitas',
            'enableAutoLogin' => true,
            'loginUrl' => '@.sso/masuk?b=http://mcu.simrs.deku',
            'identityCookie' => ['name' => '_identity-id', 'httpOnly' => true, 'domain' => 'simrs.deku'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'dbRegisterMcu' => $dbRegisterMcu,

        'db_postgre' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'pgsql:host=192.168.254.70;port=5432;dbname=simrs;',
            'username' => 'postgres',
            'password' => '1satu2dua',
            'tablePrefix' => '',
        ],
        'db_sqlsrv' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'sqlsrv:Server=192.168.252.250;Database=RS_AASimrs',
            'username' => 'sa',
            'password' => 'data_123',
            'charset' => 'utf8',
            'tablePrefix' => 'dbo.',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //            'suffix' => '.html',
            'rules' => [
                '' => 'site/index',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',                 // only for integer id
                '<controller:\w+>/<action:\w+[-\w]+\w>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+[-\w]+\w>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>s' => '<controller>/index',
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web/theme',
                    'js' => [
                        "js/jquery.min.js",
                    ]
                ],

                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web/theme',
                    'css' => [
                        'css/bootstrap.min.css',
                    ]
                ],

            ],
        ],
    ],
    'container' => [
        'definitions' => [
            // yii\bootstrap4\ActiveField::class => [
            //     'options' => [
            //         'item' => static function ($index, $label, $name, $checked, $value) use ($model) {
            //             $id = str_replace(['[', ']'], '-', $name) . $index;
            //             return \yii\helpers\Html::radio(
            //                 $name,
            //                 $checked,
            //                 [
            //                     'value' => $value,
            //                     'label' => $label,
            //                     'id' => $id
            //                 ]
            //             );
            //         }
            //     ]
            // ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
