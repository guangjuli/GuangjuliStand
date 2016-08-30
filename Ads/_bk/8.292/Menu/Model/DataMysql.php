<?php

namespace Ads\Menu\Model;

class DataMysql implements \Grace\Base\ModelInterface
{
    public function __construct()
    {
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

    /**
     * @return array
     * 一级菜单
     */
    public function menuLibIndex()
    {

        return [
            [
                'title' => '设置',
                'icon' => 'glyphicon glyphicon-home',
                'ads' => 'mc/Home/Index',
                'sort' => 10,
                'active' => 0,
            ],
            [
                'title' => '设置2',
                'icon' => 'glyphicon glyphicon-home',
                'ads' => 'mc/Home2/Index',
                'sort' => 9,
                'active' => 0,
            ],
        ];
    }


    /**
     * @return array
     * 二级一级二级以下的菜单
     */
    public function menuLib()
    {

        return [
            'asdf/asdf/asfd'=>[
                'title' => 'Dashboard',
                'icon' => 'glyphicon glyphicon-home',
                'ads' => 'Home.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '设置',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ads' => 'Set.Index',
                        'active' => 0,
                    ],
                    [
                        'title' => 'Help',
                        'icon' => 'glyphicon glyphicon-home',
                        'ads' => 'Help.Index',
                        'active' => 0,
                    ],

                ],
            ],

            'asdf/asdf/asfd2'=>[
                'title' => 'Dashboard',
                'icon' => 'glyphicon glyphicon-home',
                'ads' => 'Home.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '设置',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ads' => 'Set.Index',
                        'active' => 0,
                    ],
                    [
                        'title' => 'Help',
                        'icon' => 'glyphicon glyphicon-home',
                        'ads' => 'Help.Index',
                        'active' => 0,
                    ],

                ],
            ],

        ];
    }

}
