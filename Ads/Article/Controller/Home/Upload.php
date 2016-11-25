<?php

namespace Addons\Controller;

/*
 * 所有设备都是管理员所在机构的设备
 * login  即为手机号
 */

class Upload extends BaseController {

    public $sizelimit   = 10485760;      //1024.1024 = 1MB
    public $fileextname =  ['gif','jpg','bmp','png','txt'];
    public $source      = 'http://api.guangjuli.net';
    public $rootpath    = './P/img/';

    public $code    = [
        -101    => '没有获取到上传的文件0',
        -200    => 'extfile is limit!',
        -201    => 'file is too big!',
    ];      //调用             $this->AjaxReturn(['code' => -101,]);


    public function doUserImagePost(){
        //-----------------------------------------------------------------
        //接收数据上传文件
        //-----------------------------------------------------------------
        $res =req('Get');
        $_FILES = $_FILES['upload'];
        if(empty($_FILES['name'])){
            $this->AjaxReturn([
                'code' => -101,
            ]);
        }

        /*
         * 在发布目录下简历目录
         * './U/v/              --------> 手动
         */
        $dirp = $this->rootpath.date("Ym").'/';
        !is_dir($dirp) && @mkdir($dirp);
        $dirp = $this->rootpath.date("Ym").'/'.date("d").'/';
        !is_dir($dirp) && @mkdir($dirp);

        $extname = pathinfo($_FILES['name'], PATHINFO_EXTENSION);
        //-----------------------------------------------------------------
        $target_path = $dirp . md5($_FILES['name'].time().rand(1000000,9999999)).'.'.$extname;
        //-----------------------------------------------------------------

        //检查文件扩展名
        if(!in_array($extname,$this->fileextname)){
            $this->AjaxReturn([
                'code' => -200,
            ]);
        }


        //检查文件大小
        if($_FILES['size'] > $this->sizelimit){
            $this->AjaxReturn([
                'code'  => -201,
            ]);
        }

        //计算当前的访问域名
        $this->source  = $_SERVER['SERVER_NAME'];

//        $info = M('user')->infoByLogin(req('Post')['login']);
//        $userid        = intval($info['userId']);

        if(move_uploaded_file($_FILES['tmp_name'], $target_path)) {
            $target_path = ltrim($target_path,'.');        //去掉左边的.

            //-----------------------------------------------------------------

        $callback = $res['ckeditorfuncnum'];
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($callback,'".$target_path."','');</script>";
        }else{
            $msg = " error, please try again!" . $_FILES['error'];
            //-----------------------------------------------------------------
            $this->AjaxReturn([
                'code'  => -200,
                'msg'   => $msg,
            ]);
        }
    }

    public function AjaxReturn($res = []){
        echo json_encode([
            'code'  => $res['code']?:0,
            'msg'   => $this->code[$res['code']]?:($res['code']>0?'succeed':'failer'),
            'data'  => $res['data']?:[]
        ]);
        exit;
    }


}
