<?php

namespace App\Model;

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
                        'ca' => 'Set.Index',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => '界面设置',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Set.Gui',
                                'active' => 0,
                            ],

                        ],
                    ],
                    [
                        'title' => 'DEMO',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'Demo.Index',
                        'active' => 0,
                        'child' => [
                        ],
                    ],

                    [
                        'title' => 'Help',
                        'icon' => 'glyphicon glyphicon-home',
                        'ca' => 'Help.Index',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Help',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Index',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Table',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Table',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Form',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Form',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Form2',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Form2',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Page',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Page',
                                'active' => 0,
                            ],
                            [
                                'title' => 'JsAction',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Jsaction',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Modelsupport',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Modelsupport',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Model',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Help.Model',
                                'active' => 0,
                            ],

                        ],
                    ],
                ],
            ],
            [
                'title' => 'AppApi',
                'icon' => 'glyphicon glyphicon-home',
                'ca' => 'Api.Index',
                'active' => 0,
                'child' => [
                    [
                        'title' => 'Api',
                        'icon' => 'glyphicon glyphicon-wrench',
                        'ca' => 'Api.List',
                        'active' => 0,
                        'child' => [

                            [
                                'title' => '列表',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.List',
                                'active' => 0,
                            ],
                            [
                                'title' => '添加',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.List',
                                'ext'=>'add',
                                'active' => 0,
                            ],
                            [
                                'title' => '修改',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.List',
                                'ext'=>'edit',
                                'hidden' => 1,
                                'active' => 0,
                            ],

                            [
                                'title' => '设置',
                                'icon' => 'glyphicon glyphicon-home',
                                'ca' => 'Api.Setup',
                                'active' => 0,
                            ],

                        ],
                    ],



                ],
            ]

        ];
    }



}


//                    [
//                        'title' => '数据',
//                        'icon' => 'glyphicon glyphicon-folder-open',
//                        'ca' => 'Home.Data',
//                        'active' => 0,
//                        'child' => [
//
//                        ],
//                    ],



//
//                    [
//                        'title' => 'Map',
//                        'icon' => 'glyphicon glyphicon-home',
//                        'ca' => 'Home.Map',
//                        'active' => 0,
//                        'child' => [
//                        ],
//                    ],
//
