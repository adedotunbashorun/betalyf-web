<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Credentials
    |--------------------------------------------------------------------------
    |
    | If you're using API credentials, change these settings. Get your
    | credentials from https://dashboard.nexmo.com | 'Settings'.
    |
    */

    'api_key'    => function_exists('env') ? env('NEXMO_KEY', '') : 'd3874f3d',
    'api_secret' => function_exists('env') ? env('NEXMO_SECRET', '') : 'ebnSHtyypJH4ZmGH',

    /*
    |--------------------------------------------------------------------------
    | Signature Secret
    |--------------------------------------------------------------------------
    |
    | If you're using a signature secret, use this section. This can be used
    | without an `api_secret` for some APIs, as well as with an `api_secret`
    | for all APIs.
    |
    */

    'signature_secret' => function_exists('env') ? env('NEXMO_SIGNATURE_SECRET', '') : 'yYdfxf5Zm1vtkJurb411w8d6dNcEZVbolsuv3DT4PF3dUQYx9s',

    /*
    |--------------------------------------------------------------------------
    | Private Key
    |--------------------------------------------------------------------------
    |
    | Private keys are used to generate JWTs for authentication. Generation is
    | handled by the library. JWTs are required for newer APIs, such as voice
    | and media
    |
    */

    'private_key' => function_exists('env') ? env('NEXMO_PRIVATE_KEY', '') : '',
    'application_id' => function_exists('env') ? env('NEXMO_APPLICATION_ID', '') : '',

];
