<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '69K05Otap4kQMvc9ySUp5oWxsy8kUGVg',
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
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'datetimeFormat' => 'php: d.m.Y H:i',
            'dateFormat' => 'd MMMM y',
            'defaultTimeZone' => 'UTC',
            'timeZone' => 'Europe/Moscow',
        ],
        'urlManager' => [
            'enablePrettyUrl' => TRUE,
            'showScriptName' => FALSE,
            'rules' => [    
                'tomorrowland'=>'tomorrowland/index',
                'sets'=>'sets/index',
                'notify'=>'notify/index',
                'sets/<id:\d+>'=>'sets/view',
                'login'=>'site/login',
                'logout'=>'site/logout',
                '<url:[-\w]+>'=>'blogs/view',
                'tags/<tag:[a-zA-Zа-яА-Я0-9\_\s\+\-]{1,255}>' => 'search/tags',
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => ['css/bootstrap.min.css'],
                ]
            ]
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
        'mixcloud' => [
            'class' => 'EgorHenek\mixcloud\Mixcloud',
            'clientToken' => 'bJMH4RGmux9enHv9ZF73t3xdqPUNLB62'
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
            'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'roots' => [
                [
                    'baseUrl'=>'@web',
                    'basePath'=>'@webroot',
                    'path' => 'images',
                    'name' => 'Картинки'
                ],
                [
                    'path'  => 'set/icons',
                    'name'  => 'Иконки',
                ],
                [
                    'path' => 'logo',
                    'name' => 'Логотипы для блогов',
                ],
            ],
            'watermark' => [
                    'source'         => __DIR__.'/logo.png', // Path to Water mark image
                     'marginRight'    => 5,          // Margin right pixel
                     'marginBottom'   => 5,          // Margin bottom pixel
                     'quality'        => 95,         // JPEG image save quality
                     'transparency'   => 70,         // Water mark image transparency ( other than PNG )
                     'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
                     'targetMinPixel' => 200         // Target image minimum pixel size
            ]
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
