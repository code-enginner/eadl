<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => env('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace'   => FALSE,
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver'            => 'stack',
            'channels'          => ['single'],
            'ignore_exceptions' => FALSE,
        ],

        'single' => [
            'driver' => 'single',
            'path'   => storage_path('logs/laravel.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path'   => storage_path('logs/laravel.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
            'days'   => 14,
        ],

        'slack' => [
            'driver'   => 'slack',
            'url'      => env('LOG_SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji'    => ':boom:',
            'level'    => env('LOG_LEVEL', 'critical'),
        ],

        'papertrail' => [
            'driver'       => 'monolog',
            'level'        => env('LOG_LEVEL', 'debug'),
            'handler'      => env('LOG_PAPERTRAIL_HANDLER', SyslogUdpHandler::class),
            'handler_with' => [
                'host'             => env('PAPERTRAIL_URL'),
                'port'             => env('PAPERTRAIL_PORT'),
                'connectionString' => 'tls://' . env('PAPERTRAIL_URL') . ':' . env('PAPERTRAIL_PORT'),
            ],
        ],

        'stderr' => [
            'driver'    => 'monolog',
            'level'     => env('LOG_LEVEL', 'debug'),
            'handler'   => StreamHandler::class,
            'formatter' => env('LOG_STDERR_FORMATTER'),
            'with'      => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver'  => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => storage_path('logs/laravel.log'),
        ],


        /*************** Custom Channels ******************/

        'register' => [
            'driver' => 'single',
            'path'   => storage_path('logs/register.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'login' => [
            'driver' => 'single',
            'path'   => storage_path('logs/login.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'admin' => [
            'driver' => 'single',
            'path'   => storage_path('logs/admin.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'user' => [
            'driver' => 'single',
            'path'   => storage_path('logs/user.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'category' => [
            'driver' => 'single',
            'path'   => storage_path('logs/category.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'product_service' => [
            'driver' => 'single',
            'path'   => storage_path('logs/product_service.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'tag' => [
            'driver' => 'single',
            'path'   => storage_path('logs/tag.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'blog' => [
            'driver' => 'single',
            'path'   => storage_path('logs/blog.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'transaction' => [
            'driver' => 'single',
            'path'   => storage_path('logs/transaction.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'warehouse' => [
            'driver' => 'single',
            'path'   => storage_path('logs/warehouse.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'store' => [
            'driver' => 'single',
            'path'   => storage_path('logs/store.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'seller' => [
            'driver' => 'single',
            'path'   => storage_path('logs/seller.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'setting' => [
            'driver' => 'single',
            'path'   => storage_path('logs/setting.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'order' => [
            'driver' => 'single',
            'path'   => storage_path('logs/order.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'cart' => [
            'driver' => 'single',
            'path'   => storage_path('logs/cart.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'ticket' => [
            'driver' => 'single',
            'path'   => storage_path('logs/ticket.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],

        'comment' => [
            'driver' => 'single',
            'path'   => storage_path('logs/comment.log'),
            'level'  => env('LOG_LEVEL', 'debug'),
        ],


    ],

];