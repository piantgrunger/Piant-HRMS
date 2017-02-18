<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'name' => 'HRMS',
    // set target language to be Russian
  'language' => 'id-ID',
    
    
   'modules' => [
   'gridview' =>  [
        'class' => '\kartik\grid\Module'
        // enter optional module parameters below - only if you need to  
        // use your own export download action or custom translation 
        // message source
        // 'downloadAction' => 'gridview/export/download',
        // 'i18n' => []
    ],
     
   ], 

  // set source language to be English
  'sourceLanguage' => 'en-US',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'y2B_PhmMeo1G4hPY0dO7KfNled31dl6L',

        ],
        'view' => [
          'theme' => [
              'pathMap' => [
                 '@app/views' => '@app/templates/views'
           ],
         ],
        ],

        'urlManager' => [
       'class' => 'yii\web\UrlManager',
       // Hide index.php
       'showScriptName' => false,
       // Use pretty URLs
       'enablePrettyUrl' => true,
       'rules' => [
       ],
   ],
      'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            //'enableAutoLogin' => true,
            'enableSession' => true,
            'authTimeout' => 60*30,
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
			/*
			// if using Gmail
			// turn on at less secure apps
			// https://www.google.com/settings/security/lesssecureapps
			// please set in params.php too
			'viewPath' => '@app/mail',
			'transport'=>[
				'class'=>'Swift_SmtpTransport',
				'host'=>'smtp.gmail.com',
				'username'=>'youremail@gmail.com',
				'password'=>'your password',
				'port'=>'587',
				'encryption'=>'tls',
			],
			*/
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
        'db' => require(__DIR__ . '/db.php'),
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
        'myCrud' => [
            'class' => 'app\templates\crud\Generator',
            'templates' => [
                'my' => '@app/Templates/crud/default',
            ]
        ],
        'mymodel' => [
            'class' => 'app\templates\model\Generator',
            'templates' => [
                'my' => '@app/Templates/model/default',
            ]
        ]

    ],
    ];
}

return $config;
