<?php

namespace App\Model;

class Widget implements \Grace\Base\ModelInterface
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
     * 面包屑
     * @return mixed
     */
    public function adminBreadcrumb()
    {
        $html = '';
        if(application('data')->get('AdminGuiConfig')['Breadcrumb']){
            $adminBreadcrumb = Model('menu')->adminBreadcrumb();
            $tpl = '../Widget/adminBreadcrumb';
            $html = fetch($tpl,[
                'adminBreadcrumb' => $adminBreadcrumb
            ]);
        }
        return $html;
    }

    /**
     * 三级菜单
     * @return mixed
     */
    public function adminLevelthree()
    {

        $menulevelthree = Model('menu')->menuMainLevelthree();
        
        //如果存在更高级active 则
        $f = false;
        foreach($menulevelthree as $key=>$value){
            if($value['active']==4){
                $f = true;
            }
        }

        //存在active = 4
        if($f){
            foreach($menulevelthree as $key=>$value){
                if($value['active']!=4){
                    $menulevelthree[$key]['active'] = 0;
                }
            }
        }


        $tpl = '../Widget/adminLevelthree';
        $html = fetch($tpl,[
            'menulevelthree' => $menulevelthree
        ]);

        return $html;
    }

    /**
     * 左侧菜单 二级
     * @return mixed
     */
    public function adminNavLeft()
    {
        $tpl = '../Widget/adminNavLeft';
        $html = fetch($tpl,[
            'menuleft' => Model('menu')->menuMainsub(),          //所有
        ]);
        //D(Model('menu')->menuMainsub());
        return $html;
    }

    /**
     * 后台顶部菜单 一级
     * @return mixed
     */
    public function adminNav()
    {
        $tpl = '../Widget/adminNav';
        $html = fetch($tpl,[
            'menuhead' => Model('menu')->menuMain(),          //所有
        ]);
        //D(Model('menu')->menuMain());
        return $html;
    }


    /**
     * 消息,还有根据ca出的提示新信息
     * @return mixed
     */
    public function adminTip()
    {
        $html = '';
        if(application('data')->get('AdminGuiConfig')['Tip']) {
            $tpl = '../Widget/adminTip';
            $html = fetch($tpl, [
            ]);
        }
        return $html;
    }

    /**
     * 固定页面
     */

    /**
     * footer
     * @return mixed
     */
    public function adminFooter()
    {
        $html = '';
        if(application('data')->get('AdminGuiConfig')['Footer']) {
            $tpl = '../Widget/adminFooter';
            $html = fetch($tpl, [
            ]);
        }
        return $html;
    }


}
