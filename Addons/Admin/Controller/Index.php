<?php

namespace App\Addons\Demo;


class Demo {

    public function __construct(){
    }

    public function behaviors()
    {
        return [
            //属性
            'profile'=>[
                'title'     => '测试插件',
                'chr'       => 'demo',
                'description' => '测试插件,描述其中的流程功能',
                'icon'      => 'php.png',
            ],

            'menu'=>[
                '0'=>[
                    'title' => '用户管理',
                    'uri'   => 'demo.index',
                ],
                '1'=>[
                    'title' => '用户用户列表',
                    'uri'   => 'demo.index',
                ],
            ],
            //标准动作映射        //必须的
            'action'=>[
                'install'   => 'demo.uninstall',    //安装方法
                'uninstall' => 'demo.uninstall',
                'option'    => 'demo.index',
                'html'      => 'demo.html',     //html方法
                'widget'    => 'demo.widget',   //wedget方法
            ],
        ];
    }
}

/**
 * 统一的行为模式
 * 安装
 * 卸载
 * 设置
 * 根据参数显示html
 * 根据参数显示wedget
 *
 */

