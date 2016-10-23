<?php
/**
 * Application configuration shared by all test types
 */
return [
    'language' => 'en-US',
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
            'fixtureDataPath' => '@tests/codeception/fixtures',
            'templatePath' => '@tests/codeception/templates',
            'namespace' => 'tests\codeception\fixtures',
        ],
    ],
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=news',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mailer',
            'useFileTransport' => false,
            'fileTransportPath' => '@app/mails',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mailtrap.io',
                'username' => '0f5cef76990c98',
                'password' => '727e50f6f0ba45',
                'port' => '25',
                'encryption' => 'tls',
                ]
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
