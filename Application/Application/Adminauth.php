<?php

namespace Grace\Adminauth;


/** Cookies class 保存,读取,更新,清除cookies数据。可设置前缀。强制超时。数据可以是字符串,数组,对象等。
 */

class Adminauth{ // class start

    private $_config    = array();                       // default expire
    private $clientScrect  = 'f2g3g33h4h5';
    private $adminName  = '';
    private $password   = '';                       // default expire

    public function __construct($config = array()){
        $this->_config      = $config;
        $this->adminName    = $config['adminName']?:'singleAdmin';
        $this->password     = $config['password']?:'';
    }

    public function auth($password = '')
    {
        $time           = time();
        $username       = $this->adminName;
        $clientSecret   = $this->clientScrect;
        $vercode        = md5($username.$time.$clientSecret);

        if($this->password == $password){
            app('cookies')->set('adminName',$username,3600);
            app('cookies')->set('adminTime',$time,3600);
            app('cookies')->set('adminVercode',$vercode,3600);
            return true;
        }else{
            return false;
        }

    }

    //是否已经登录
    public function isLogin()
    {
        $adminName  = app('cookies')->get('adminName');
        $adminTime  = app('cookies')->get('adminTime');
        $vercode = app('cookies')->get('adminVercode');
        if($vercode == md5($adminName.$adminTime.$this->clientScrect)){
            return true;
        }else{
            return false;
        }
    }

    //是否已经登录
    public function isLoginRedirect($url = '')
    {
        if(!$this->isLogin())header('Location: ' . $url);
       // if(!$this->isLogin())
    }

    public function logout($url = '')
    {
        app('cookies')->set('adminName','123',-1);
        if($url)    header('Location: ' . $url);
    }

} // class end
