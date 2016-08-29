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

}
