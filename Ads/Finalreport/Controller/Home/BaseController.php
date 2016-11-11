<?php

namespace Ads\Finalreport\Controller\Home;

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
                'title' => '最终报告',
                'des'   => '最终报告',
                'ads'   => 'Finalreport/html/index',
                'hidden'=> 0,
                'child' => [
                    [ 'title' => '列表',
                        'des'   => '用户列表',
                        'ads'   => 'Finalreport/html/list',
                        'hidden'=> 0,
                        'sort'  =>30
                    ],
                    [ 'title' => '详情',
                        'des'   => '详情',
                        'ads'   => 'Finalreport/html/detail',
                        'hidden'=> 1,
                    ],
                    [ 'title' => '个人列表',
                        'des'   => '个人列表',
                        'ads'   => 'Finalreport/html/personallist',
                        'hidden'=> 1,
                    ],
                ]
            ]
        ];
        return $res;
    }

}
