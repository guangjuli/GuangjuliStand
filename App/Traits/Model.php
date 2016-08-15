<?php
namespace App\Traits;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:51
 * 通用部件
 * 使用 use Application\Traits\FileLoad;
 */

trait Model{

    /**
     * @return string
     * 解析文档数据
     */
    public function Model($key = '')
    {
        $abs = "App\\Model\\".ucfirst($key);
        return new $abs();
    }

}