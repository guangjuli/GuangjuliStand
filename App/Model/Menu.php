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

    //获取面包屑数据
    public function adminBreadcrumb()
    {
        $local = $this->router['controller'] . '.' . $this->router['mothed'];
        $local = strtolower($local);
        $params =  $this->router['params'];
        $arr = $this->menuArrIni();

        $cat = [];
        //1 : 包含ext的匹配
        //三层
        foreach ($arr as $k => $v) {
            if ($v['ca'] == $local) {
                $cat = $v;
            }
            //对一级菜单进行处理
            if ($v['child']) {
                foreach ($v['child'] as $kk => $vv) {
                    if ($vv['ca'] == $local) {
                        $cat = $vv;
                    }
                    //对二级菜单进行处理
                    if ($vv['child']) {
                        foreach ($vv['child'] as $kkk => $vvv) {
                            if ($vvv['ca'] == $local && $vvv['ca'] = '') {
                                $cat = $vvv;
                            }
                        }
                        if($params){
                            //更高级匹配
                            foreach ($vv['child'] as $kkk => $vvv) {
                                if ($vvv['ca'].$vvv['ext'] == $local.$params) {
                                    $cat = $vvv;
                                }
                            }
                        }
                    }
                }

            }
        }
        return $cat;




        //1 : 不包含ext的匹配


    }

    /**
     * menuArr 对数据初始化
     * menuArr 完整的菜单
     * 注意 : 最终 active = 1 上级菜单也需要置1
     * 对原始数据进行处理,
     */
    public function menuArr()
    {
        $local = $this->router['controller'] . '.' . $this->router['mothed'];
        $local = strtolower($local);
        $params =  $this->router['params'];

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
                        //第一遍搜索到则结束
                        foreach ($vv['child'] as $kkk => $vvv) {
                            if ($vvv['ca'] == $local) {
                                $arr[$k]['child'][$kk]['child'][$kkk]['active'] = 3;
                                $arr[$k]['child'][$kk]['active'] = 3;
                                $arr[$k]['active'] = 3;
                            }
                        }
                        //第二遍搜索  更高级搜索
                        foreach ($vv['child'] as $kkk => $vvv) {
                            if ($vvv['ca'] == $local && $vvv['ext'] == $params ) {
                                $arr[$k]['child'][$kk]['child'][$kkk]['active'] = 4;
                                $arr[$k]['child'][$kk]['active'] = 4;
                                $arr[$k]['active'] = 4;
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }

    public function menuMainLevelthree()
    {
        $arr = $this->menuArr();
        $local = strtolower($this->router['controller'] . '.' . $this->router['mothed']);
        //寻找三级菜单
        $main = '';

        foreach($arr as $k=>$v) {
            foreach($v['child'] as $kk =>$vv){
                $_main = $vv['ca'];
                if($vv['ca'] == $local){
                    $main = $_main;
                    break;
                }
                //判断三级
                foreach($vv['child'] as $kkk =>$vvv) {
                    if($vvv['ca'] == $local){
                        $main = $_main;
                        break;
                    }
                }
            }
        }
        //得到$main

        //获得main 主菜单的
        $child = [];
        foreach($arr as $k=>$v){
            foreach($v['child'] as $kk=>$vv) {
                if ($vv['ca'] == $main) {
                    $child = $vv['child'];
                }
            }
        }
        return $child;
    }


    /**
     * 返回下级菜单 和子菜单
     */
    public function menuMainsub()
    {
        $arr = $this->menuArr();
        $local = strtolower($this->router['controller'] . '.' . $this->router['mothed']);

        //判断是一级还是二级还是三级
        //然后决定二级菜单是什么

        $main = 'home.index';

        foreach($arr as $k=>$v){
            $_main = $v['ca'];
            if($v['ca'] == $local){
                $main = $_main;
                break;
            }
            //判断二级
            foreach($v['child'] as $kk =>$vv){
                if($vv['ca'] == $local){
                    $main = $_main;
                    break;
                }
                //判断三级
                foreach($vv['child'] as $kkk =>$vvv) {
                    if($vvv['ca'] == $local){
                        $main = $_main;
                        break;
                    }
                }
            }
        }

        //获得main 主菜单的
        $child = [];
        foreach($arr as $key=>$value){
            if($value['ca'] == $main){
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
     * 初始化
     * @return array
     */
    private function menuArrIni()
    {

//        $arr = $this->menuLib();
        $arr = Model('data')->menuLib();

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
                    $arr[$k]['child'][$kk]['breadcrumb']['title'] = $arr[$k]['title'];
                    $arr[$k]['child'][$kk]['breadcrumb']['path'] = $arr[$k]['path'];

                    if ($vv['child']) {
                        //对三级菜单进行处理
                        foreach ($vv['child'] as $kkk => $vvv) {
                            $arr[$k]['child'][$kk]['child'][$kkk]['ca']  = strtolower($vvv['ca']);
                            //创建访问路径

                            $arr[$k]['child'][$kk]['child'][$kkk]['path'] = '/'.str_replace('.','/',$arr[$k]['child'][$kk]['child'][$kkk]['ca']);

                            //最后一层需要判断ext是否存在
                            if($arr[$k]['child'][$kk]['child'][$kkk]['ext']){
                                $arr[$k]['child'][$kk]['child'][$kkk]['path'] = '/'.str_replace('.','/',$arr[$k]['child'][$kk]['child'][$kkk]['ca']).'/'.$arr[$k]['child'][$kk]['child'][$kkk]['ext'];
                            }
                            $arr[$k]['child'][$kk]['child'][$kkk]['breadcrumb']['path'] = $arr[$k]['child'][$kk]['path'];
                            $arr[$k]['child'][$kk]['child'][$kkk]['breadcrumb']['title'] = $arr[$k]['child'][$kk]['title'];

                            $arr[$k]['child'][$kk]['child'][$kkk]['breadcrumbtop']['path'] = $arr[$k]['path'];
                            $arr[$k]['child'][$kk]['child'][$kkk]['breadcrumbtop']['title'] = $arr[$k]['title'];
                        }
                    }
                }
            }
        }
        return $arr;
    }








}
