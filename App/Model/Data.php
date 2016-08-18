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
                'ca' => 'Home.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '设置',
                        'ca' => 'Home.Set',
                        'active' => 0,
                        'child' => [
                        ],
                    ],
                    [
                        'title' => '数据',
                        'ca' => 'Home.Data',
                        'active' => 0,
                        'child' => [
                        ],
                    ],
                ],
            ],
            [
                'title' => '用户管理',
                'ca' => 'Home.USER',
                'active' => 0,
                'child' => [
                    [
                        'title' => 'Dashboard',
                        'ca' => 'Home.Index2',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Ind2ex',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.2Index',
                                'active' => 0,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Dashboard',
                        'ca' => 'Home.Index2',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.2Index',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
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
