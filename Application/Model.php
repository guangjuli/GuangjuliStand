<?php

namespace Application;


class Model
{


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
        // echo $abstract;
        $this->instances[$abstract] = $this->build($abstract);
        return $this->instances[$abstract];
    }

    /*
    |------------------------------------------------------------
    | 实例化一个模型
    |------------------------------------------------------------
    */
    public function makeModel($abstract)
    {
        if (isset($this->Mo[$abstract])) {
            return $this->Mo[$abstract];
        }
        if (!class_exists($abstract)) {
            //没有找到执行方法
            //执行404;
            echo '<br>Miss file : <br>';
            echo $abstract;
            D();
        }
        //检查类文件是否存在
        $this->Mo[$abstract] = new $abstract();     //模型存储

        return $this->Mo[$abstract];
    }

    //禁止外部调用
    private function build($abstract)
    {
        $obj_ = "\\Application\\Model\\$abstract";
        if (!class_exists($obj_)) {
            return null;
        }
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


}
