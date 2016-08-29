<?php
namespace Ads\Data\Controller\Data;

/**
 * Class Data
 * @package Ads\Base\Controller\Data
 * 数据反馈
 */
class Data
{

    public function doIndex()
    {
    }

    /**
     * 二级菜单下面的三级菜单 - 根据chr读取
     * @return array
     */
    public function doMenuThree()
    {
        return [
            'base'=>[
                [
                    'title' => '列表',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menutopchr' => '',
                ],
                [
                    'title' => '添加',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'ext'=>'add',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',

                    'menuupchr' => '',
                    'menuuptitle' => '',
                    'menuuppath' => '',
                ],
            ],
            'data'=>[
                [
                    'title' => '列表',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menuupchr' => '',
                    'menuuptitle' => '',
                    'menuuppath' => '',
                ],
                [
                    'title' => '添加',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ca' => 'Api.List',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menuupchr' => '',
                    'menuuptitle' => '',
                    'menuuppath' => '',
                ],
            ],
            'dter'=>[
                [
                    'title' => '列表',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menuupchr' => '',
                ],
                [
                    'title' => '添加',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menuupchr' => '',
                ],
            ],
        ];
    }


    /**
     * @return array
     * 顶级菜单下面的二级菜单
     * 根据chr读取
     */
    public function doMenuSub()
    {
        return [
            'base'=>[
                [
                    'title' => '列表',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menutopchr' => '',
                    'menutoptitle' => '',
                    'menutoppath' => '',
                ],
                [
                    'title' => '添加',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'ext'=>'add',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menutopchr' => '',
                    'menutoptitle' => '',
                    'menutoppath' => '',

                ],
            ],
            'data'=>[
                [
                    'title' => '列表',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menutopchr' => '',
                    'menutoptitle' => '',
                    'menutoppath' => '',
                ],
                [
                    'title' => '添加',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ca' => 'Api.List',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menutopchr' => '',
                    'menutoptitle' => '',
                    'menutoppath' => '',
                ],
            ],
            'dter'=>[
                [
                    'title' => '列表',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menutopchr' => '',
                    'menutoptitle' => '',
                    'menutoppath' => '',
                ],
                [
                    'title' => '添加',
                    'des' => 'Dashboard',
                    'icon' => 'glyphicon glyphicon-home',
                    'ads'   => 'Home/Index',
                    'sort' => 0,

                    'active' => 0,
                    'path' => '',
                    'menutopchr' => '',
                    'menutoptitle' => '',
                    'menutoppath' => '',
                ],
            ],
        ];
    }


    /**
     * 顶级菜单下面的二级菜单
     */
    public function doMenuSec()
    {
        $top = $this->doMenuTop();
        $list = $this->doMenuAll();
        $topc = [];

        foreach($top as $key=>$value){
            foreach($list as $key=>$value){

            }
        }
    }

    /**
     * @return array
     * 顶级菜单
     */
    public function doMenuTop()
    {
        $res = [];
        $list = $this->domenuAll();
        foreach($list as $key=>$value){
            if($value['parendId'] ==0){
                $res[$key] = $value;
            }
        }
        return $res;
    }

        /**
     * 所有的菜单数据
     * 根据当前ads计算 当前 top secend 和three
     */
    public function doMenuAll()
    {
        $ads = req('Ads');
        $res = server('db')->getall("SELECT * FROM `menu` order by sort desc,menuId desc",'menuId');
        //对active进行计算
        $lckey = 0;
        foreach($res as $key=>$value){
            if($value['ads'] == $ads){
                $lckey = $value['menuId'];
            }
        }
        //parent id
        $parendid = $res[$lckey]['parendId'];
        //top id
        $topid = $res[$res[$lckey]['parendId']]['parendId'];
        if($lckey)$res[$lckey]['active'] = 1;
        if($parendid)$res[$parendid]['active'] = 1;
        if($topid)$res[$topid]['active'] = 1;
        return $res;
    }

    /**
     * @return string
     * //后台根路径
     */
    public function doAdminroot()
    {
        return '/man/';
    }

}
