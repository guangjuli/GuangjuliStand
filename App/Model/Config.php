<?php

namespace App\Model;

class Config implements \Grace\Base\ModelInterface
{
    private $Configfile;

    public function __construct()
    {
        $this->Configfile = __DIR__ . '/../../Application/Config/App.php';
    }

    public function Config($key = '')
    {
        $config = include $this->Configfile;
        if ($key) {
            return $config[$key];
        } else {
            return $config;
        }
    }

    /**
     * 返回依赖关系
     * @return array
     */
    public function depend()
    {
        return [
        ];
    }


}
