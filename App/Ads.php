<?php
namespace App;

class AdsBase
{
    private $package = '';

    private function getpackage($ads = ''){
        $_ads  = explode('/',trim($ads, '/'));
        if(empty($_ads[0])) return $this->package;
        return $_ads[0];
    }

    /**
     * @param string $a
     * 指定package
     * @return $this
     */
    public function Package($ads = '')
    {
        $Package = $this->getpackage($ads);
        $this->package = $Package;
        return $this;
    }

    /**
     * 调用接口
     */
    public function ads($ads = '',$params = []){}
    public function pds($ads = '',$params = []){}

}

class Ads extends AdsBase
{
    private $_config = array();
    public static $_instance = null;
    public static $_ads = '';

    private $_packagelist = [];

    private $_package = '';
    private $_params = '';
    private $_d = '';
    private $_s = '';

    private $isCache    = false;
    private $cacheObject = null;

    private function __construct($config = array())
    {
        $this->_config = $config;
    }

    public static function getInstance($config = [])
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }



    /**
     * 通过gui走rui路由
     */
    public static function Gui()
    {
        //如果post 响应提交
        if(req('Router')['type'] == 'POST'){
            $ads = req('Ads');
            $html = self::getInstance()->pds($ads);
            return $html;
        }else{
            $controller = new \Ads\Gui\Controller\Home\Home();
            return $controller->doIndex();
        }
    }


    /**
     * 特殊形式,强制GUI调用
     */
    public static function Run($ads = '')
    {
        if (empty($ads)) $ads = req('Ads');
        return self::getInstance()->pds($ads);
    }

    /**
     * @param array $par
     * 获取cache
     */
    private function getcache($ads = '',$params= [])
    {
        if(!$this->cacheObject){
            $ob = "\\Ads\\Cache\\Controller\\Html\\Html";
            if(class_exists($ob)){
                $this->cacheObject = new $ob();
            }
        }
        //拦截
        if(empty($this->cacheObject))            return false;

        //todo 根据参数获取缓存
        $this->isCache = false;
//        $res = $this->cacheObject->getcache($ads,$params);
//          if(empty($res)) return false;
//        $this->isCache = true;
//        return $res;
        return false;
    }

    /**
     * @param array $par
     * 设置cache
     */
    private function setcache($ads = '',$params = [],$rc = [])
    {
        //todo 根据参数设置缓存
        if($this->isCache){
        }
        return true;
    }

    public function pds($ads = '',$params = [])
    {

        $ads  = explode('/',trim($ads, '/'));
        $this->_package = $ads[0];
        $this->_d = $ads[1];
        $this->_s = $ads[2];
        $this->_params = $ads[3];

        //缓存
        $res = $this->getcache($ads,$params);
        if(empty($res)){
            $res = $this->doMothed($params);
        }
        $this->setcache($ads,$params,$res);

        return $res;
    }

    //同pds
    public function ads($ads = '',$params = [])
    {
        $ads  = explode('/',trim($ads, '/'));
        $this->_package = $ads[0];
        $this->_d = $ads[1];
        $this->_s = $ads[2];
        $this->_params = $ads[3];

        //缓存
        $res = $this->getcache($ads,$params);
        if(empty($res)){
            $res = $this->doMothed($params);
        }
        $this->setcache($ads,$params,$res);

        return $res;
    }

    /**
     * @return string
     * 上面全部是变换,最终会走这个路口
     * 执行
     */
    public function doMothed($params = [])
    {

        if(empty($this->_package)) return '';
        $this->Package($this->_package);;         //注册
        if(empty($this->_d)) $this->_d = 'Home';
        if(empty($this->_s)) $this->_s = 'Index';
        //===========================================================
        if($this->_packagelist[$this->_package][$this->_d]){
        }else{
            $ob = "\\Ads\\".ucfirst($this->_package).'\\Controller\\'.ucfirst($this->_d)."\\".ucfirst($this->_d);

            if(class_exists($ob)){
                $this->_packagelist[$this->_package][$this->_d] = new $ob();
            }else{
                return "Miss Class :: $ob";
            }
        }
        $rc = '';
        $mothed = 'do'.$this->_s;

        if(req('Router')['type'] == 'POST'){
            //对uri路由过来的进行post响应
            $__ads  = explode('/',trim(req('Ads'), '/'));
            $__ads[1]?:"Home";
            $__ads[2]?:"Index";
            if(strtolower($__ads[0].$__ads[1].$__ads[2]) == strtolower($this->_package.$this->_d.$this->_s)){
                $mothed = $mothed.'Post';
            }
        }

        /**
         * 根据type决定是否加post后缀
         */
        if ($this->_packagelist[$this->_package][$this->_d]) {
            $this->_packagelist[$this->_package][$this->_d]->_p = $this->_package;
            $this->_packagelist[$this->_package][$this->_d]->_d = $this->_d;
            $this->_packagelist[$this->_package][$this->_d]->_s = $this->_s;
            $this->_packagelist[$this->_package][$this->_d]->_params = $this->_params;
            $this->_packagelist[$this->_package][$this->_d]->_pds = $this->_package.'/'.$this->_d.'/'.$this->_s.'/'.$this->_params;
            $rc = $this->_packagelist[$this->_package][$this->_d]->$mothed($params);
        }
        return $rc;
    }

}
