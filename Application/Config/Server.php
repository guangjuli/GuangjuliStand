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
        'Smarty'   => 'Smarty.php',
        'Db'       => 'Db.php',
        'Cookies'  => 'Cookies.php',
        'Adminauth'=> 'Adminauth.php',
        'Mmcfile'  => 'Mmcfile.php',
        'Cache'     => 'Cache.php',
        'View'      => 'View.php'
    ],

    'Providers'=>[
        'Smarty'    => Grace\Smarty\Smarty::class,
        'Req'       => Grace\Req\Req::class,             //
        'View'      => Grace\View\View::class,           //
        'Db'        => Grace\Db\Db::class,
        'Cookies'   => Grace\Cookies\Cookies::class,
        'Parsedown' => Parsedown::class,
//        'Cache'     => Desarrolla2\Cache\Cache::class
        'Cache'    => Grace\Cache\Cache::class,
    ],

];




