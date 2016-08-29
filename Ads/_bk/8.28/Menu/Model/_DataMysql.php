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
            [
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
                        'child' => [
                            [
                                'title' => '界面设置',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Set.Gui',
                                'active' => 0,
                            ],

                        ],
                    ],
                    [
                        'title' => 'Help',
                        'icon' => 'glyphicon glyphicon-home',
                        'ads' => 'Help.Index',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Help',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Index',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Table',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Table',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Form',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Form',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Form2',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Form2',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Page',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Page',
                                'active' => 0,
                            ],
                            [
                                'title' => 'JsAction',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Jsaction',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Modelsupport',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Modelsupport',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Model',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Help.Model',
                                'active' => 0,
                            ],

                        ],
                    ],

                ],
            ],

            /**
             * API相关
             *
             */
            [
                'title' => 'AppApi',
                'icon' => 'glyphicon glyphicon-home',
                'ads' => 'Api.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => 'Api',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ads' => 'Api.List',
                        'active' => 0,
                        'child' => [

                            [
                                'title' => '列表',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Api.List',
                                'active' => 0,
                            ],
                            [
                                'title' => '添加',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Api.List',
                                'ext'=>'add',
                                'active' => 0,
                            ],
                            [
                                'title' => '修改',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Api.List',
                                'ext'=>'edit',
                                'hidden' => 1,
                                'active' => 0,
                            ],

                            [
                                'title' => '日志',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'Api.Log',
                                'active' => 0,
                            ],

                        ],
                    ],



                ],
            ],
            /**
             * 用户 / 用户组 / token
             */
            [
                'title' => '用户管理',
                'icon' => 'glyphicon glyphicon-home',
                'ads' => 'User.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '用户',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ads' => 'User.List',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => '用户列表',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'User.List',
                                'active' => 0,
                            ],
                            [
                                'title' => '添加用户',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'User.List',
                                'ext'=>'add',
                                'active' => 0,
                            ],

                            [
                                'title' => '修改用户',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'User.List',
                                'ext'=>'edit',
                                'hidden'=>1,
                                'active' => 0,
                            ],
                        ],
                    ],
                    [
                        'title' => '用户组',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ads' => 'User.Group',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => '用户组列表',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'User.Group',
                                'active' => 0,
                            ],
                            [
                                'title' => '添加用户组',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'User.Group',
                                'ext'=>'add',
                                'active' => 0,
                            ],

                            [
                                'title' => '修改用户组',
                                'icon' => 'glyphicon glyphicon-home',
                                'ads' => 'User.Group',
                                'ext'=>'edit',
                                'hidden'=>1,
                                'active' => 0,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Token',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ads' => 'Token.Index',
                        'active' => 0,
                        'child' => [
                        ],
                    ],



                ],
            ],
            [
                'title' => '搜索',
                'icon' => 'glyphicon glyphicon-home',
                'ads' => 'Search.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => '搜索用户',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ads' => 'Search.User',
                        'active' => 0,
                        'child' => [
                        ],
                    ],
                ],
            ],

        ];
    }



}
