<?php
namespace Application\Traits;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:51
 * 通用部件
 * 使用 use Application\Traits\FileLoad;
 */

trait FileLoad{

    /**
     * @return string
     * 解析文档数据
     */
    public function load($file=''){
        if(file_exists($file)){
            return include $file;
        }
        return [];
    }

}