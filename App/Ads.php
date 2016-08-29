<?php
namespace App;

class Ads
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

    public static function Gui()
    {
        $controller = new \Ads\Gui\Controller\Home\Home();
        return $controller->doIndex();
    }

    public static function Run($ads = '')
    {
        /**
         * 特殊形式,强制GUI调用
         */
        if (empty($ads)) $ads = req('Ads');
        //下面三个相同
        return self::getInstance()->pds($ads);
//        return self::getInstance()->Package($ads[0])->d($ads[1])->s($ads[2]);
//        return self::getInstance()->Package("$ads[0]")->ds("$ads[1]/$ads[2]");
    }

    public function Package($a = '')
    {
        $this->_package = $a;
        return $this;
    }

    public function d($d = '')
    {
        $this->_d = $d;
        return $this;
    }

    public function params($params = '')
    {
        $this->_params = $params;
        return $this;
    }

    public function s($s = '')
    {
        $ds  = explode('/',trim($s, '/'));
        $this->_s = $ds[0];
        if(!empty($ds[1]))$this->_params = $ds[1];
        return $this->doMothed();
    }

    public function ds($ds = '')
    {
        $ds  = explode('/',trim($ds, '/'));
        $this->_d = $ds[0];
        $this->_s = $ds[1];
        if(!empty($ds[2]))$this->_s = $ds[2];
        return $this->doMothed();
    }

    public function pds($ads = '')
    {
        $ads  = explode('/',trim($ads, '/'));
        $this->_package = $ads[0];
        $this->_d = $ads[1];
        $this->_s = $ads[2];
        $this->_params = $ads[3];
        return $this->doMothed();
    }
    //同pds
    public function ads($ads = '')
    {
        $ads  = explode('/',trim($ads, '/'));
        $this->_package = $ads[0];
        $this->_d = $ads[1];
        $this->_s = $ads[2];
        $this->_params = $ads[3];
        return $this->doMothed();
    }


    public function doMothed()
    {
        if(empty($this->_package)) return '';
        if(empty($this->_d)) $this->_d = 'Home';
        if(empty($this->_s)) $this->_s = 'Index';
        //===========================================================
        if($this->_packagelist[$this->_package][$this->_d]){
        }else{
            $ob = "\\Ads\\".ucfirst($this->_package).'\\Controller\\'.ucfirst($this->_d)."\\".ucfirst($this->_d);
            $this->_packagelist[$this->_package][$this->_d] = new $ob();
        }
        $mothed = 'do'.$this->_s;
        return $this->_packagelist[$this->_package][$this->_d]->$mothed($this->_params);
//        return $this->Package($this->_package)->Controller($this->_d)->Mothed($this->_s,$this->_params);
    }


    //pagckage的方法
    //widget
    function help(){}
    function setup(){}
    //data
    function depend(){}
    function menu(){}
    function bedepend(){}
    function dependtable(){}
    function icon(){}
    function api(){}
    function info(){}

//    function ds(ds,$params){}     //执行ds
//    function d(){}     //执行d
//    function s($s,$params){}     //执行s


/**
 * 输出的集中形式
 * 1 : widget输出 [ads路由输出]
 * 2 : 输出数据 [api]
 * 3 : debug界面 用于查看和调试 也是widget界面 但是接受参数
 */

}
