<?php

namespace Application;


class Application
{

    use \Application\Traits\ApplicationHelp;
    /*
    * @var null
    * wise单例调用
    */
    private static $_instance = null;       //单例调用

    //服务对象存储
    public $Providers = array();             //服务对象存储 映射

    //对象实例
    public $Instances = array();             //服务对象存储 实例

    /*
    * @param string $conf
    * 根据配置获取设定
    */
    private function __construct($voconfig = [])
    {
        //遍历application目录下的文件,建立对象目录
        $this->Baseroot = __DIR__ . '/';
        $this->Providers = server()->Config('Application');
        $this->ServerConfig = server()->Config('Config');
    }

    /*
    |------------------------------------------------------------
    | 单例调用
    |------------------------------------------------------------
    */
    public static function getInstance($config = [])
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    /*
    |------------------------------------------------------------
    | 实例化注册类
    |------------------------------------------------------------
    */
    public function make($abstract)
    {
        $abstract = ucfirst($abstract);
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }
        //未定义的服务类 返回空值;
        if (!isset($this->Providers[$abstract])) {
            return null;
        }
        // echo $abstract;
        $this->instances[$abstract] = $this->build($abstract);
        return $this->instances[$abstract];
    }

    //禁止外部调用
    private function build($abstract)
    {
        $obj_ = $this->Providers[$abstract];
        $obj = new $obj_();
        return $obj;
    }

    /**
     * @return array
     * 容器对象列表
     */
    public function obList()
    {
        return $this->Providers;
    }

    public function load($file = '')
    {
        if (file_exists($file)) {
            return include $file;
        }
        return [];
    }


}
