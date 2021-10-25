<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$dbRegisterMcu = require __DIR__ . '/dbRegisterMcu.php';
$dbLis = require __DIR__ . '/dbLis.php';

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
          'user' => [
            'class' => 'app\models\User',
            'identityClass' => 'app\models\Identitas',
            'enableAutoLogin' => true,
            'loginUrl' => '@.sso/masuk?b=http://mcu.simrs.aa',
            'identityCookie' => ['name' => '_identity-id', 'httpOnly' => true, 'domain' => 'simrs.mut'],
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
        'dbLis' => $dbLis,
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
      
            yii\grid\SerialColumn::class => [
                'headerOptions' => [
                    // 'class' => 'bg-lightblue'
                ]
            ],
            yii\grid\DataColumn::class => [
                'filterInputOptions' => [
                    'class' => 'form-control form-control-sm',
                    'autocomplete' => 'off'
                ],
                'headerOptions' => [
                    // 'class' => 'bg-lightblue'
                ],
                'contentOptions' => [
                    // 'style' => 'white-space: nowrap;',
                    // 'class' => 'action-column',
                    'style' => 'overflow: hidden; text-overflow: ellipsis;',
                ]
            ],
            yii\grid\ActionColumn::class => [
                'class' => 'app\components\ActionColumn',
                'headerOptions' => [
                    'class' => 'bg-lightblue'
                ],
                'contentOptions' => [
                    'class' => 'action-column',
                    'style' => 'text-align: center;'
                ],
            ],
            yii\bootstrap4\ActiveField::class => [
                'inputOptions' => ['class' => 'form-control form-control-sm', 'autocomplete' => 'off'],
            ],
            yii\widgets\DetailView::class => [
                'options' => ['class' => 'table table-sm table-striped table-bordered detail-view'],
            ],
            kartik\date\DatePicker::class => [
                'options' => ['placeholder' => 'Pilih...'],
                // 'removeButton' => false,
                'pluginOptions' => [
                    'todayHighlight' => true,
                    'todayBtn' => true,
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                ]
            ],
            kartik\daterange\DateRangePicker::class => [
                'useWithAddon' => true,
                // 'attribute' => 'sale_date',
                'convertFormat' => true,
                'presetDropdown' => true,
                'options' => [
                    // 'id' => 'transaksipenjualansearch-sale_date-0',
                    'placeholder' => 'Pilih...',
                ],
                'i18n' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'forceTranslation' => true
                ],
                'autoUpdateOnInit' => false,
                'containerTemplate' => '
                        <div class="kv-drp-dropdown">
                            <span class="left-ind">{pickerIcon}</span>
                            <input type="text" readonly class="form-control form-control-sm range-value" value="{value}">
                            <span class="right-ind kv-clear" style="" title="Clear">&times;</span>
                            <span class="right-ind"><b class="caret"></b></span>
                        </div>
                        {input}
                    ',
                'pluginOptions' => [
                    'linkedCalendars' => false,
                    'showDropdowns' => true,
                    'timePicker' => false,
                    'locale' => [
                        // 'format' => 'Y-m-d'
                        'format' => 'd-m-Y'
                    ],
                    'minYear' => (int) date('Y') - 10,
                    'maxYear' => (int) date('Y') + 0,
                ],
            ],
            kartik\select2\Select2::class => [
                'theme' => 'bootstrap',
                'size' => 'sm',
            ],
            kartik\number\NumberControl::class => [
                'maskedInputOptions' => [
                    // 'prefix' => 'Rp ',
                    'groupSeparator' => '.',
                    'radixPoint' => ',',
                    'allowMinus' => false,
                ],
                'displayOptions' => ['class' => 'form-control form-control-sm kv-monospace'],
                'options' => [
                    'type' => 'hidden',
                    'label' => '<label>Saved Value: </label>',
                    'class' => 'kv-saved',
                    'readonly' => true,
                    'tabindex' => 1000
                ],
                'saveInputContainer' => ['class' => 'kv-saved-cont'],
            ],
            app\components\number\KyNumber::class => [
                'maskedInputOptions' => [
                    // 'prefix' => 'Rp ',
                    // 'alias' => 'numeric',
                    'positionCaretOnClick' => 'none',
                    'groupSeparator' => '.',
                    'radixPoint' => ',',
                    'allowMinus' => true,
                    'unmaskAsNumber' => true, // untuk ambil unmasked value sebagai number,
                ],
                'displayOptions' => ['class' => 'form-control form-control-sm', 'autocomplete' => 'off'],
                'options' => [
                    'type' => 'hidden',
                    // 'label' => '<label>Saved Value: </label>',
                    'label' => null,
                    'class' => 'kv-saved',
                    'readonly' => true,
                    'tabindex' => 1000
                ],
                'saveInputContainer' => ['class' => 'kv-saved-cont'],
            ],
            yii\bootstrap4\Modal::class => [
                'headerOptions' => [
                    'class' => 'modal-header bg-orange',
                    // 'style'=> ['color:white']
                ]
                // 'options' => [
                //     // 'data-backdrop' => 'static',
                //     'class' => 'fade effect-slide-in-bottom',
                // ],

            ],

        ],
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
        'allowedIPs' => ['127.0.0.1', '*'],
    ];
}

return $config;
