<?php
namespace Ads\Config\Controller\Data;

class Data
{

    public function __construct(){
        $this->config = server('db')->getmap('select name,`value` from system_config');
    }

    public function doConfig($name){
        return $this->config[$name];
    }

}
