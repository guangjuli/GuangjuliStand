<?php
namespace Application\Application;

/**
 * cache对象
 * 本地数据临时存储
 */


class Demo
{

    public function Depends()
    {
        return [
            'Application::Application\Application\Data'=>[
                'Server::Config'
            ]
        ];
    }

    public function __construct(){
    }

    public function Run()
    {
        echo "Application\\Application\\Demo";
    }


}


