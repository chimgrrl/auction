<?php
return [
	/* 'aliases' => [
        '@frontendUrl' => '@web/frontend/web',
        '@backendUrl' => '@web/backend/web',
    ], */
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=auctionDB',
            'username' => 'root',
            'password' => 'jempogi123',
            'charset' => 'utf8',
        ],
        'mongodb' => [
            'class' => '\yii\mongodb\Connection',
            'dsn' => 'mongodb://auction:123456@127.0.0.1:27017/auctionDB',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ], 
		'UtilHelper' => [
			'class' => 'common\components\UtilHelper',
		],
    ],
    'modules' => [
		'gii' => [
            'class' => 'yii\gii\Module',
            'generators' => [
                'mongoDbModel' => [
                    'class' => 'yii\mongodb\gii\model\Generator'
                ]
            ],
        ],		
    ]
];
