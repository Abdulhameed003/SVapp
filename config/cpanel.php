<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Domain name without www and http:// or https://
    |--------------------------------------------------------------------------
    */

    'domain' => 'crm.exitra',

    /*
    |--------------------------------------------------------------------------
    | Folder name subdomain with path.
    |--------------------------------------------------------------------------
    */

    'subdomain_dir' => '',

    /*
    |--------------------------------------------------------------------------
    | Cpanel IP
    |--------------------------------------------------------------------------
    */

    'ip' => env("CPANEL_IP"),

    /*
    |--------------------------------------------------------------------------
    | Cpanel port
    |--------------------------------------------------------------------------
    */

    'port' => env("CPANEL_PORT"),

    /*
    |--------------------------------------------------------------------------
    | Cpanel User Name
    |--------------------------------------------------------------------------
    */

    'username' => env("CPANEL_USERNAME"),

    /*
    |--------------------------------------------------------------------------
    | Cpanel Password
    |--------------------------------------------------------------------------
    */

    'password' => env("CPANEL_PASS"),

    /*
    |--------------------------------------------------------------------------
    | Debug Mode
    |--------------------------------------------------------------------------
    */

    'debug' => true,

];