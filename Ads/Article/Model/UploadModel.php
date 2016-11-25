<?php

namespace Model;

/*
 * 所有设备都是管理员所在机构的设备
 * login  即为手机号
 */

class UploadModel{

    public $sizelimit   = 10485760;      //1024.1024 = 1MB
    public $fileextname =  ['gif','jpg','png'];
    public $source      = 'http://api.guangjuli.net';
    public $rootpath    = './P/img/';

    public $code    = [
        -101    => '没有获取到上传的文件0',
        -200    => 'extfile is limit!',
        -201    => 'file is too big!',
    ];      //调用             $this->AjaxReturn(['code' => -101,]);


    public function UserImage($file)
    {
        //-----------------------------------------------------------------
        //接收数据上传文件
        //-----------------------------------------------------------------
        if (empty($file['name'])) {
            $this->AjaxReturn([
                'code' => -101,
            ]);
        }
        /*
         * 在发布目录下简历目录
         * './U/v/              --------> 手动
         */
        $dirp = $this->rootpath . date("Ym") . '/';
        !is_dir($dirp) && @mkdir($dirp);
        $dirp = $this->rootpath . date("Ym") . '/' . date("d") . '/';
        !is_dir($dirp) && @mkdir($dirp);

            $extname = pathinfo($file['name'], PATHINFO_EXTENSION);
            //-----------------------------------------------------------------
            $target_path = $dirp . md5($file['name']. time() . rand(1000000, 9999999)) . '.' . $extname;
            //-----------------------------------------------------------------
            //检查文件扩展名
            if (!in_array($extname, $this->fileextname)) {
                $this->AjaxReturn([
                    'code' => -200,
                    'name' => $file['name']
                ]);
            }
            //检查文件大小
            if ($file['size'] > $this->sizelimit) {
                $this->AjaxReturn([
                    'code' => -201,
                    'name' => $file['name']
                ]);
            }


           // $info = M('user')->infoByLogin(req('Post')['login']);
//        $userid        = intval($info['userId']);

            if (move_uploaded_file($file['tmp_name'], $target_path)) {
                $target_path = ltrim($target_path, '.');        //去掉左边的.
                //写入数据库
                $this->source  = $_SERVER['SERVER_NAME'];
                $path = 'http://'.$this->source.$target_path;
                return $path;
            } else {
                $msg = " error, please try again!" . $file['error'];
                //-----------------------------------------------------------------
                $this->AjaxReturn([
                    'code' => -200,
                    'msg' => $file['name'],
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
