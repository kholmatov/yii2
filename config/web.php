<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'components' => [

        'GoogleCloudPrint' => [
            'class' => 'inquid\googlecloudprint\GoogleCloudPrint',
            'refresh_token' => '1/Cb1CCMesZ4wSlTkuOhVr72BTAdEUX1guS9RVwyV-4kk', //'1/j7h-P0O7XSO883Dh-m5QaQfuKByIpLrKcW2Kk6BylOg',
            'client_id' => '673058166961-oac1a6oism9asbht7rhls3m4g4c7sppl.apps.googleusercontent.com',//'404184363170-48rlmbj7g36t7701o4pm8sfp7kqf3hfr.apps.googleusercontent.com',
            'client_secret' => 'lMmcyx8a3a8i3KLDAo7vKmbd',//'KDCmI9iKEzhBI3T90ie9Ashq',
            'grant_type' => 'refresh_token',
            'redirect_uri' =>'http://e51cca8e.ngrok.io/googlecloudauth', //http://e51cca8e.ngrok.io/?r=googlecloudauth
            'default_printer_id' => '6c6254c4-60c8-a12b-96cb-2176012db991'
        ],

//        'GoogleCloudPrint' => [
//            'class' => 'inquid\googlecloudprint\GoogleCloudPrint',
//            'refresh_token' => '4/TADGciR2sd1Xev9c9jVqTY_63B_hbLE3PF6dSKC3trdHkp9latOQqjGPUvADSKlDhMh5t7uhNJdokJzVN1VDbXY#',
//            'client_id' => '307931809062-tprua50s3kbnhlc4jme1pfn2s1rojhha.apps.googleusercontent.com',
//            'client_secret' => '-eyXv7COq4j9ctDyGDmTwlbH',
//            'redirect_uri' =>'http://127.0.0.1:7979/r=googlecloudauth', // http://yourdomain.com/?r=googlecloudauth
//            'grant_type' => 'refresh_token',
//            'default_printer_id' => '__google__docs'
//        ],


        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'vlqHfq6nzGgsSKAaR0EDwgDtriIE16qS',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ],
    ],
    'controllerMap' => [
        'googlecloudauth' => 'inquid\googlecloudprint\GooglecloudauthController',
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
