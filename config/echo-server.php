<?php

return [

    /*
    |--------------------------------------------------------------------------
    | App Manager
    |--------------------------------------------------------------------------
    |
    | App Managers works as a retriever for apps via an API. This
    | is mainly used by the Node.js server to retrieve the app
    | by ID via the "api" driver.
    |
    */

    'app-manager' => [

        'driver' => 'array',

        /*
        |--------------------------------------------------------------------------
        | Array App Manager
        |--------------------------------------------------------------------------
        |
        | The apps will be retrieved from the given array.
        |
        */

        'array' => [

            'manager' => \RenokiCo\EchoServer\AppsManagers\ArrayAppsManager::class,

            'apps' => [
                [
                    'id' => env('ECHO_SERVER_APP_DEFAULT_ID', 'echo-app'),
                    'key' => env('ECHO_SERVER_APP_DEFAULT_KEY', 'echo-app-key'),
                    'secret' => env('ECHO_SERVER_APP_DEFAULT_SECRET', 'echo-app-secret'),
                ],
            ],
        ],

        /*
        |--------------------------------------------------------------------------
        | Database App Manager
        |--------------------------------------------------------------------------
        |
        | The apps will be retrieved from the database using
        | the out-of-the-box migrations.
        |
        */

        'database' => [

            'manager' => \RenokiCo\EchoServer\AppsManagers\DatabaseAppsManager::class,

            'model' => \RenokiCo\EchoServer\Models\EchoApp::class,

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | API Routes Settings
    |--------------------------------------------------------------------------
    |
    | Configure the route for the API routes.
    |
    */

    'api' => [

        'token' => env('ECHO_SERVER_APPS_MANAGER_TOKEN', 'echo-app-token'),

        'domain' => null,

        'middleware' => [
            'api',
        ],

        'prefix' => 'echo-server',

    ],

];
