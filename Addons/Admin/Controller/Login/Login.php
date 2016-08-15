<?php
namespace App\Addons;

class Login extends BaseController {

    use \App\Addons\Traits\AjaxReturn;

    public function __construct(){
        parent::__construct();
    }

    public function doIndexPost()
    {
        if(app('adminauth')->auth(req('Post')['password'])){
            $this->AjaxReturn([
                'url'=>'?ad=admin'          //跳转
            ]);
        }else{
            $this->AjaxReturn(-200);        //出错
        }
    }

    public function doIndex()
    {

        //登录
        $this->display();
    }


}
