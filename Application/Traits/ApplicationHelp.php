<?php
namespace Application\Traits;

/**
* Created by PhpStorm.
* User: shampeak
* Date: 2016/7/17
* Time: 3:51
* 通用部件
* 使用 use Application\Traits\FileLoad;
*/

trait ApplicationHelp{


    private function objectList()
    {
        return [
            'Application'   => '../Document/application.md',
            //'Adminauth'     => '../Wise/readme.md',
        ];
    }

    //页面
    public function help()
    {
        //获取显示模板
        $tpl = \Grace\Base\Help::getplframe();

        //oblist
        $objectList = $this->objectList();

        $chr = $title = $_GET['chr'];

        //计算左侧菜单
        //<li  class="active"><a href="/index.php?book=01-grace&lm=controller&ar=controller.md"> Controller </a></li>
        $nav = '';
        foreach($objectList as $key=> $value){
            if($key == $chr){
                $nav .= "<li  class=\"active\"><a href=\"?chr=$key\"> $key </a></li>";
            }else{
                $nav .= "<li><a href=\"?chr=$key\"> $key </a></li>";
            }
        }

        $nr = '';
        if($objectList[$chr]){
            //获取内容
            $file = $objectList[$chr];
            $nr = (new \Parsedown())->text(file_get_contents(__DIR__.'/'.$file));

        }else{
            $nr = '';
        }

        $html = str_replace('##nav##',$nav,$tpl);
        $html = str_replace('##nr##',$nr,$html);
        $html = str_replace('##title##',$title,$html);
        echo $html;
        exit;
    }

}