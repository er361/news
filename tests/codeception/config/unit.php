<?php
/**
 * Application configuration for unit tests
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/web.php'),
    require(__DIR__ . '/config.php'),
    [
        'components' => [
            'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                // send all mails to a file by default. You have to set
                // 'useFileTransport' to false and configure a transport
                // for the mailer to send real emails.
                'useFileTransport' => true,
            ],
        ]
    ]
);
