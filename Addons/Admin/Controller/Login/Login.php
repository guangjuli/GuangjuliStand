<?php
namespace Addons\Controller;


class Login extends BaseController {

    use \Addons\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }

    /**
     *
     */
    public function doIndexPost()
    {
        if(Model('Event')->AdminAuth_auth($_POST['password'])){
            $this->AjaxReturn([
                'code'=>200,
                'url'=>'/admin/'
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'密码错',
            ]);
        }
    }

    /**
     *
     */
    public function doIndex()
    {
        Model('page')->pageLogin();         //登录界面
        exit;
    }

    /**
     *
     */
    public function doLogout()
    {
        Model('Event')->AdminAuth_Logout("/admin/login");
        exit;
    }



}
