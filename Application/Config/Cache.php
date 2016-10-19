<?php
/*
 |------------------------------------------------
 | 类文件和配置文件注册
 |------------------------------------------------
 | 这里不是完全的依赖注入
 */

//$cacheDir = '../Cache/tmp';
//$adapter = new \Desarrolla2\Cache\Adapter\File($cacheDir);
//$adapter->setOption('ttl', 3600);
//return $adapter;


return [


//    'cacheType' => 'File',
//    'cacheDir'  =>  '../Cache/tmp',
//    'adapter'   => \Desarrolla2\Cache\Adapter\File::class,

    'cacheType' => 'Memcache',
    'adapter'   => \Desarrolla2\Cache\Adapter\Memcache::class,
    'server'    => [
        ['127.0.0.1', 11211]
    ],

    'ttl'       => 3600
];