<?php
namespace Ads\Base\Controller\Sys;

/**
 * Class Sys
 * @package Ads\Base\Controller\Sys
 * 标准数据和widget反馈
 */
class Sys {

    public function doMenu()
    {
        return [];
    }

    public function doSetup()
    {
        //根据config.setup 获得配置表单
        //存储为config.data
        //并且形成反馈
        return server('Smarty')->ads('base/sys/setup')->fetch('',[
        ]);
    }

    public function doHelp()
    {
        $nr = @file_get_contents(__DIR__.'/../../Help.md');
        $basesyshelphtml = server('Parsedown')->text($nr);
        return server('Smarty')->ads('base/sys/help')->fetch('',[
            'basesyshelphtml'=>$basesyshelphtml
        ]);
    }

    public function doReadme()
    {
        $nr = @file_get_contents(__DIR__.'/../../Readme.md');
        $basesysreadmehtml = server('Parsedown')->text($nr);
        return server('Smarty')->ads('base/sys/readme')->fetch('',[
            'basesysreadmehtml'=>$basesysreadmehtml
        ]);
    }

    public function doApi()
    {
        $nr = @file_get_contents(__DIR__.'/../../Api.md');
        $basesysapihtml = server('Parsedown')->text($nr);
        return server('Smarty')->ads('base/sys/api')->fetch('',[
            'basesysapihtml'=>$basesysapihtml
        ]);
    }

}
