<?php

namespace Ads\Queue\Controller\Home;

//hook
class BaseController{

    public function __construct(){

    }

    /**
     * @return array
     * 返回可以调用的api
     */
    public function doApi(){
        return [
        ];
    }


    public function doVersion(){
        return '1.0';
    }

    /**
     * @return array
     * 返回依赖关系
     */
    public function doDepend()
    {
        return [
            'asdf',
            'asdf',
        ];
    }

    public function doDependTable()
    {
        return [
            'Menu'
        ];
    }

    public function doMenu()
    {

        $res = [
            [
                'title' => '守护',
                'des'   => '守护',
                'ads'   => 'queue/html/index',
                'hidden'=> 0,
                'sort'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '列表',
                        'ads'   => 'queue/html/list',
                        'hidden'=> 0,
                        'sort'=> 90,
                    ],
                    [ 'title' => 're',
                        'des'   => 're',
                        'ads'   => 'queue/html/timere',
                        'hidden'=> 0,
                        'sort'=> 20,
                    ],
                ]
            ]
        ];
        return $res;
    }

}
