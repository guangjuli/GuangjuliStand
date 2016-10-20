<?php
/*
 |------------------------------------------------
 | 类文件和配置文件注册
 |------------------------------------------------
 */

return [

    'FileReflect'  => [
        'Config'    => 'Config.php',
        'Application'=>'Application.php',
        'Addons'    =>'Addons.php',
        'App'       =>'App.php',
        'V'       =>'V.php',
        //对象配置
        'Db'        => 'Db.php',
        'Cookies'   => 'Cookies.php',
        'Smarty'    => 'Smarty.php',
        //g2
        'View'      => 'View.php',
        'Log'       => 'Log.php',
//        'Mmc'       => 'Mmc.php',
        'Cache'     => 'Cache.php',
    ],

    'Providers'=>[
        //无配置
        'Parsedown' => Grace\Parsedown\Parsedown::class,
        'Req'       => Grace\Req\Req::class,             //
        'Xls'       => Grace\Xls\Xls::class,
        //g1
        'Db'        => Grace\Db\Db::class,
        'Cookies'   => Grace\Cookies\Cookies::class,
//        'Mmc'       => Grace\Mmc\Mmc::class,
        'Cache'     => Grace\Cache\Cache::class,
        'Smarty'    => Grace\Smarty\Smarty::class,
        //g2
        'View'      => Grace\View\View::class,           //
        'Log'       => Grace\Log\Log::class,
    ],

];




