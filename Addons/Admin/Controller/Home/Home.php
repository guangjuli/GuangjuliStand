<?php
namespace App\Addons;


class Home extends BaseController {

    use \App\Addons\Traits\AdTraits;        //通用方法
    use \App\Addons\Traits\Api;        //通用方法



    public function __construct(){
        parent::__construct();
    }

    /**
     * 管理首页
     */
    public function doIndex()
    {
        //$this->AjaxReturn();
        //$this->AjaxReturn();
        //$this->install();
        $root = req('addonsRouter')['root'];     //这个下面的所有目录
        $list = $this->Model('scan')->getList($root);
        $list = array_diff($list,array('Admin','Model','Traits'));
        //去掉系统的

        //OK,所有的addons
        $list = $list?:array();
        foreach($list as $key=>$value){
        }



        $this->display();
    }



    //文件夹
    //API / Document / Help 的区别
    //api 所有的方法详细叙述
    //document 全文档
    //help 面向开发人员的快速帮助
    //管理首页
    //检查目录下所有的文件夹 生成列表
    //文件夹下的addonsname.json文件记录相关信息,这个信息可以通过设置修改

    //同时addons下面的addons.json记录所有的信息汇总,供调用



















    //============================================

    /*
     * 通用的
    install
    uninstall
    setup   设置界面
    api     显示api
    document 显示document
    help    显示help
    unit    unit测试界面
    log     日志查看
    depend  依赖列表
    属性 page 页面属性列表
    属性 data 数据属性列表
    index   默认首页
    根据adfetch = true / false 选择是否widget
    根据adjson=true/false 选择是否反馈json
     */

    //============================================

    //所有的页面列表
    public function doPage()
    {
        echo '所有页面';
    }

    //所有的数据列表
    public function doData()
    {

    }

    //安装
    public function doInstall()
    {

    }

    //卸载
    public function doUninstall()
    {

    }

    //设置
    public function doSetup()
    {

    }



}
