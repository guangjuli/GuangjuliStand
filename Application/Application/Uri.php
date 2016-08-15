<?php
namespace Application\Application;

/**
 * cache对象
 * 本地数据临时存储
 */


class Uri
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
        $this->rootpath = \Grace\Server\Server::getInstance()->Config('Config')['Data'];
    }

}


