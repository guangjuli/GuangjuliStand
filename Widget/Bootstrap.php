<?php

namespace Widget;

class Bootstrap
{
    private $_config = array();

    /**
     * Bootstrap constructor.
     *
     * @param array $config
     */
    public function __construct($config = array())
    {
        $this->_config = $config;
    }

    /**
     * 入口
     */
    public static function Run($controller = '',$params =[])
    {
        $controller = ucfirst($controller);
        //检查是否合法的widget
        //echo $controller;
        $Widgetlist = include(__DIR__.'/Config/Widget.php');
        if(in_array($controller,$Widgetlist)){
            sc('widget',$controller);
            $ob = "\\Widget\\Controller\\$controller";
            $html = new $ob($params);
            return $html($params);
        }else{
            return '';
        }
    }


}