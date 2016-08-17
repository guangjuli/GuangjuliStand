<?php

namespace App\Model;

class Menu implements \Grace\Base\ModelInterface
{
    private $router = [];

    public function __construct()
    {
        $this->router = req('Router');
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
                        'title' => 'Dashboard',
                        'ca' => 'Home.Index3',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Index5',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Index',
                                'active' => 0,
                            ],
                        ],
                    ],
                    [
                        'title' => 'Dashboard',
                        'ca' => 'Home.Index12',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Index4',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Index3',
                                'active' => 0,
                            ],
                        ],
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
                        'ca' => 'Home.Index',
                        'active' => 0,
                        'child' => [
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Index',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Index',
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
                                'ca' => 'Home.Index',
                                'active' => 0,
                            ],
                            [
                                'title' => 'Dashboard',
                                'ca' => 'Home.Index',
                                'active' => 0,
                            ],
                        ],
                    ],
                ],
            ]

        ];
    }

    /**
     * menuArr 对数据初始化
     * menuArr 完整的菜单
     *
     *
     * 注意 : 最终 active = 1 上级菜单也需要置1
     *
     * 对原始数据进行处理,
     */
    public function menuArr()
    {
        $local = $this->router['controller'] . '.' . $this->router['mothed'];
        $local = strtolower($local);
        $arr = $this->menuArrIni();

        //三层
        foreach ($arr as $k => $v) {
            //对一级菜单进行处理
            if ($v['ca'] == $local) {
                $arr[$k]['active'] = 1;
            }

            if ($v['child']) {
                foreach ($v['child'] as $kk => $vv) {
                    //对二级菜单进行处理
                    if ($vv['ca'] == $local) {
                        $arr[$k]['child'][$kk]['active'] = 2;
                        $arr[$k]['active'] = 2;

                    }

                    if ($vv['child']) {
                        //对三级菜单进行处理
                        foreach ($vv['child'] as $kkk => $vvv) {
                            if ($vvv['ca'] == $local) {
                                $arr[$k]['child'][$kk]['child'][$kkk]['active'] = 3;
                                $arr[$k]['child'][$kk]['active'] = 3;
                                $arr[$k]['active'] = 3;

                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }


    /**
     * 返回下级菜单 和子菜单
     */
    public function menuMainsub()
    {
        $arr = $this->menuArr();
        //获取当前的二级菜单列表
        $local = strtolower($this->router['controller'] . '.' . $this->router['mothed']);

        $child = [];
        foreach($arr as $key=>$value){
            if($value['ca'] == $local){
                $child = $value['child'];
            }
        }
        return $child;
    }

    /**
     * 返回主菜单
     * @return array
     */
    public function menuMain()
    {
        $arr = $this->menuArr();
        foreach($arr as $key=>$value){
            unset($arr[$key]['child']);
        }
        return $arr;
    }

    /**
     * @return array
     */

    private function menuArrIni()
    {
        $arr = $this->menuLib();
        //添加 path / ca / breadcrumb / breadcrumbtop 属性
        //三层
        foreach ($arr as $k => $v) {
            //对一级菜单进行处理
            $arr[$k]['ca'] = strtolower($v['ca']);
            $arr[$k]['path'] =  '/'.str_replace('.','/',$arr[$k]['ca']);

            if ($v['child']) {
                foreach ($v['child'] as $kk => $vv) {
                    //对二级菜单进行处理
                    $arr[$k]['child'][$kk]['ca'] = strtolower($vv['ca']);
                    $arr[$k]['child'][$kk]['path'] = '/'.str_replace('.','/',$arr[$k]['child'][$kk]['ca']);
                    $arr[$k]['child'][$kk]['breadcrumb'] = $arr[$k]['path'];

                    if ($vv['child']) {
                        //对三级菜单进行处理
                        foreach ($vv['child'] as $kkk => $vvv) {
                            $arr[$k]['child'][$kk]['child'][$kkk]['ca']  = strtolower($vvv['ca']);
                            //创建访问路径
                            $arr[$k]['child'][$kk]['child'][$kkk]['path'] = '/'.str_replace('.','/',$arr[$k]['child'][$kk]['child'][$kkk]['ca']);
                            $arr[$k]['child'][$kk]['child'][$kkk]['breadcrumbtop'] = $arr[$k]['path'];
                            $arr[$k]['child'][$kk]['child'][$kkk]['breadcrumb'] = $arr[$k]['child'][$kk]['path'];
                        }
                    }
                }
            }
        }
        return $arr;
    }








}
