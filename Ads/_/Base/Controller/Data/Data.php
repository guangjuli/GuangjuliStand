<?php
namespace Ads\Base\Controller\Data;

/**
 * Class Data
 * @package Ads\Base\Controller\Data
 * 数据反馈
 */
class Data
{

    public function __construct()
    {
    }

    public function doPage404()
    {
        return '';
    }

    /**
     * @return string
     * 后台访问根路径
     */
    public function doRootpath()
    {
        return "http://gst.so/";
    }

}
