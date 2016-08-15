<?php
/*
 |------------------------------------------------
 | 类文件和配置文件注册
 |------------------------------------------------
 */

return [

    'FileReflect'  => [
        'Config'   => 'Config.php',
        'Application'=>'Application.php',
        'Addons'    =>'Addons.php',
        'Smarty'    => 'Smarty.php',
        'Db'        => 'Db.php',
        'Cookies'   => 'Cookies.php',
        'Cache'     => 'Cache.php',
        'View'      => 'View.php',
        'Log'      => 'Log.php'
    ],

    'Providers'=>[
        'Smarty'    => Grace\Smarty\Smarty::class,
        'Req'       => Grace\Req\Req::class,             //
        'View'      => Grace\View\View::class,           //
        'Db'        => Grace\Db\Db::class,
        'Cookies'   => Grace\Cookies\Cookies::class,
        'Parsedown' => Grace\Parsedown\Parsedown::class,
        'Cache'    => Grace\Cache\Cache::class,
        'Log'    => Grace\Log\Log::class,

    ],

];




