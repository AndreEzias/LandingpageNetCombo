<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path(),
        ],

        'ftp_atento' => [
            'driver' => 'sftp',
            'host' => 'sftp-store.atento.com.br',
            'username' => 'svc_vendii_npremium',
            'password' => env('FTP_PASSWORD_ATENTO'),
            'root' => '/home_portal/svc_vendii_npremium/SFTP_Vendii_NPremium',
        ],

        'ftp_vector' => [
            'driver' => 'ftp',
            'host' => '191.33.76.246',
            'port' => '6688',
            'username' => env('FTP_PASSWORD_VECTOR'),
            'password' => 'V3ct0r@18',
        ],

        'ftp_fga' => [
            'driver' => 'sftp',
            'host' => 'sftp.xbrain.com.br',
            'username' => 'fornecedor15',
            'password' => env('FTP_PASSWORD_FGA'),
            'root' => '/InBox'
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

    ],

];
