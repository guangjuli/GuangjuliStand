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

trait View{

    /**
     * @return string
     * 解析文档数据
     */
    public function View($tpl = '', $data = []){
echo APPROOT;
        $views = server('View')->viewpath(APPROOT.'/Views/')->router(req('Router'));
        $views->display($tpl, $data);
    }

}