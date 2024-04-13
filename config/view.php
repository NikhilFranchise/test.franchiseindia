<?php
use Jenssegers\Agent\Agent;

$Agent = new Agent();

// Agent detection influences the view storage path
if ($Agent->isMobile()) {
    // You're a mobile device
    $viewPaths = [
        resource_path('mobile'),
        resource_path('views'),
    ];
} else {
    // You're a desktop device, or something similar
    $viewPaths = [
        resource_path('views'),
    ];
}

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => $viewPaths,

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
