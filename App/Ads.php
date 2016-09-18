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
     * @param string $ads
     * Markdown文档读取
     * @return string
     */
    function help($ads = ''){
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Help.md';
        if(!is_file($file)) return '';
        $nr = server('Parsedown')->text(file_get_contents($file));
        return $nr;
    }

    function readme($ads = ''){
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Readme.md';
        if(!is_file($file)) return '';
        $nr = server('Parsedown')->text(file_get_contents($file));
        return $nr;
    }

    function api($ads = ''){
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Api.md';
        if(!is_file($file)) return '';
        $nr = server('Parsedown')->text(file_get_contents($file));
        return $nr;
    }

    /**
     * @param string $ads
     * Data 数据读取
     * @return string
     */
    function DataInfo($ads = ''){
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Data.Info.php';
        if(!is_file($file)) return [];
        $nr = include($file);
        return $nr;
    }

    function DataConfig($ads = ''){
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Data.Config.php';
        if(!is_file($file)) return [];
        $nr = include($file);
        return $nr;
    }

    function DataApi($ads = '')
    {
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Data.Api.php';
        if(!is_file($file)) return [];
        $nr = include($file);
        return $nr;
    }
    /**
     * @param string $ads
     * Sql 读取
     * @return string
     */
    function SqlInstall($ads = '')
    {
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Install.sql';
        if(!is_file($file)) return '';
        $nr = file_get_contents($file);
        return $nr;
    }
    function SqlUnInstall($ads = '')
    {
        $Package = $this->getpackage($ads);
        $file = __DIR__.'/../Ads/'.ucfirst($Package).'/Uninstall.sql';
        if(!is_file($file)) return '';
        $nr = file_get_contents($file);
        return $nr;
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
     * todo 待完善
     * 依赖关系,更多资源
     */
    public function menu(){}
    public function icon(){}

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

    public function pds($ads = '',$params = [])
    {

        $ads  = explode('/',trim($ads, '/'));
        $this->_package = $ads[0];
        $this->_d = $ads[1];
        $this->_s = $ads[2];
        $this->_params = $ads[3];

        return $this->doMothed($params);
    }
    //同pds
    public function ads($ads = '',$params = [])
    {



        $ads  = explode('/',trim($ads, '/'));
        $this->_package = $ads[0];
        $this->_d = $ads[1];
        $this->_s = $ads[2];
        $this->_params = $ads[3];
        return $this->doMothed($params);
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
                echo "Miss Class :: $ob";
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
