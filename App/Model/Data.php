<?php

namespace App\Model;

class Data implements \Grace\Base\ModelInterface
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




    public function menuLib()
    {
        //todo 转数据库
        return [
            [
                'title' => 'Dashboard',
                'icon' => 'glyphicon glyphicon-home',
                'ca' => 'Home.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '设置',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'Home.Set',
                        'active' => 0,
                        'child' => [
                        ],
                    ],
                    [
                        'title' => '数据',
                        'icon' => 'glyphicon glyphicon-folder-open',
                        'ca' => 'Home.Data',
                        'active' => 0,
                        'child' => [
                        ],
                    ],
                    [
                        'title' => 'Map',
                        'icon' => 'glyphicon glyphicon-home',
                        'ca' => 'Home.Map',
                        'active' => 0,
                        'child' => [
                        ],
                    ],
                    [
                        'title' => 'Help',
                        'icon' => 'glyphicon glyphicon-home',
                        'ca' => 'Home.Help',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Help',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Home.Help',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Help1',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Home.Help1',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Help2',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Home.Help2',
                                'active' => 0,
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => '用户管理',
                'icon' => 'glyphicon glyphicon-home',
                'ca' => 'Home.USER',
                'active' => 0,
                'child' => [
                    [
                        'title' => 'Dashboard',
                        'icon' => 'glyphicon glyphicon-home',
                        'ca' => 'Home.Index2',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Dashboard',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Home.Ind2ex',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Home.2Index',
                                'active' => 0,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Dashboard',
                        'icon' => 'glyphicon glyphicon-home',
                        'ca' => 'Home.Index2',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Dashboard',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Home.2Index',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Home.2Index',
                                'active' => 0,
                            ],
                        ],
                    ],
                ],
            ]

        ];
    }



}
