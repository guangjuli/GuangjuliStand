<?php
namespace Ads\Devicetype\Controller\Html;

class Html {
    use \App\Traits\AjaxReturnHtml;

    public function doIndex(){
    }

    //编辑
    public function doEdit()
    {
        $deviceTypeId = intval(req('Get')['deviceTypeId']);
        $info = server('Db')->getRow("select * from `device_type` where `deviceTypeId` = {$deviceTypeId }");
        return  server('Smarty')->ads('devicetype/html/edit')->fetch('',[
            'row' => $info
        ]);
    }

    public function doEditPost()
    {
        $req = req('Post');
        $deviceTypeId = intval($req['deviceTypeId']);
        $where = "`deviceTypeId` = {$deviceTypeId}";
        unset($req['deviceTypeId']);
        $req = saddslashes($req);
        server('db')->autoExecute('device_type',$req,'UPDATE',$where);
        R("/man/?devicetype/html/list");
    }

    //添加
    public function doAdd()
    {
        return  server('Smarty')->ads('devicetype/html/add')->fetch('',[]);
    }

    public function doAddPost()
    {
        $req = saddslashes(req('Post'));
        server('db')->autoExecute('device_type',$req,'INSERT');
        R("/man/?devicetype/html/list");
    }

    /**
     * 显示列表
     */
    public function doList()
    {
        $list = server('db')->getall("select * from `device_type` order by `sort` desc,`deviceTypeId` desc");
        return  server('Smarty')->ads('devicetype/html/list')->fetch('',[
            'list' => $list
        ]);
    }

    //删除
    public function doDelete(){
        $deviceTypeId = intval(req('Get')['deviceTypeId']);
        server('db')->query("delete from `device_type` WHERE `deviceTypeId` = {$deviceTypeId}");
        $this->AjaxReturn([
        ]);
    }
}
