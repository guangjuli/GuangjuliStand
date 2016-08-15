<?php
namespace Application\Application;

/**
 * cache对象
 * 本地数据临时存储
 */


class Data
{
    private $rootpath   = '';
    private $key        = 'Default';

    public function Depends()
    {
        return [
            'Application::Application\Application\Data'=>[
                'Server::Config'
            ]
        ];
    }

    public function __construct(){
        $this->rootpath = \Grace\Server\Server::getInstance()->Config('Config')['Data'];
    }

    public function key($key='Default')
    {
        $this->key = $key;
        return $this;
    }

    public function set($key = null,$value = [])
    {
        if(func_num_args() == 1){
            $value = $key;
        }else{
            $this->key = $key;
        }
        $this->save($value);     //保存
    }

    public function get($key = null)
    {
        if(!empty($key))$this->key = $key;
        return $this->read();      //读取
    }

    public function save($value)
    {
        if(empty($this->key))$this->key = 'Default';
        if (!preg_match('/^[0-9a-zA-Z.]+$/',$this->key))
        {
            halt('Application::Application\Application\Data Key error');
        }
        $file = $this->rootpath.$this->key.'.data';
        $value = json_encode($value);
        file_put_contents($file,$value);
        return true;
    }

    public function read()
    {
        if(empty($this->key))$this->key = 'Default';
        if (!preg_match('/^[0-9a-zA-Z.]+$/',$this->key))
        {
            halt('Application::Application\Application\Data Key error');
        }
        $file = $this->rootpath.$this->key.'.data';
        $nr = file_get_contents($file);
        $nr = json_decode($nr,true);
        return $nr;
    }



}


