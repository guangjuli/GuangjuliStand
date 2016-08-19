<?php

namespace Application\Application;

class AdminAuth implements \Grace\Base\ModelInterface
{ // class start

    private $_config = array();                       // default expire
    private $clientSecret = '';
    private $adminName = '';
    private $password = '';                       // default expire
    private $expireTime = 0;

    /**
     * 返回依赖关系
     * @return array
     */
    public function depend()
    {
        return [
            "Server::Cookies",
            "Model::Config",
        ];
    }

    /** 
     * AdminAuth constructor.
     *
     * @param array $config
     */
    public function __construct($config = array())
    {
        $this->_config = server()->Config('App')['AdminAuth'];

        //Application('Config')->config('AdminAuth');;

        $this->adminName = $this->_config['adminName'] ?: 'singleAdminGuangjuli';
        $this->password = $this->_config['password'] ?: '';
        $this->clientSecret = $this->_config['clientSecret'] ?: '';
        $this->expireTime = $this->_config['expireTime'] ?intval($this->_config['expireTime']): 3600;
    }

    /**
     * => Model('Event')->auth($password);
     * @param string $password
     *
     * @return bool
     */
    public function auth($password = '')
    {
        if ($this->password == $password) {
            server('cookies')->set('adminAuthName', $this->adminName, $this->expireTime);
            server('cookies')->set('adminAuthTime', time(), $this->expireTime);
            server('cookies')->set('adminAuthVercode',  md5($this->adminName . time() . $this->clientSecret), $this->expireTime);
            return true;
        } else {
            return false;
        }

    }

    /**
     * => Model('Gate')->isLoginAdminAuth();
     * //是否已经登录
     * @return bool
     */
    public function isLogin()
    {
        $adminName = server('cookies')->get('adminAuthName');
        $adminTime = server('cookies')->get('adminAuthTime');
        $vercode = server('cookies')->get('adminAuthVercode');
        if ($vercode == md5($adminName . $adminTime . $this->clientSecret)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * => Model('Event')->AdminAuthLogout($url);
     *
     * @param string $url
     */
    public function logout($url = '')
    {
        server('cookies')->set('adminAuthName', '123', -1);
        if ($url) {
            header('Location: ' . $url);
        }
    }

} // class end
