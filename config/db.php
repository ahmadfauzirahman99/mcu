<?php

return [
    // DB LOCAL LAPTOP
    // 'class' => 'yii\db\Connection',
    // 'dsn' => 'pgsql:host=localhost;port=5432;dbname=simrs',
    // 'username' => 'postgres',
    // 'password' => 'root',
    // 'charset' => 'utf8',

    // DB DEV SERVER
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=192.168.254.70;port=5432;dbname=simrs_dev',
    'username' => 'postgres',
    'password' => '1satu2dua',
    'charset' => 'utf8',


    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
