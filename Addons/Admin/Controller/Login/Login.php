<?php
namespace Addons\Controller;

use Addons\Traits\AjaxReturnHtml;

class Login extends BaseController {

    use AjaxReturnHtml;

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
                'url'=>'/'
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
        Model('Event')->AdminAuth_Logout("/login");
        exit;
    }



}
