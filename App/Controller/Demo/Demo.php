<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2016/9/17
 * Time: 21:04
 */
namespace  App\Controller;
class Demo extends BaseController
{
    use \App\Traits\AjaxReturnHtml;
    public function __construct()
    {
        parent::__construct();
    }
    public function doIndex()
    {
        define('FILE_PATH', "../wwwroot/demoimages/");
        //echo "hello world from index";
        $res=req('Get');
        array_key_exists('title',$res)?$rc['title']=$res['title']:$rc['title']="guangjulistand demo MVC";
        array_key_exists('name1',$res)?$pagename['name1']=$res['name1']:$pagename['name1']="page1";
        array_key_exists('name2',$res)?$pagename['name2']=$res['name2']:$pagename['name2']="page2";
        array_key_exists('name3',$res)?$pagename['name3']=$res['name3']:$pagename['name3']="page3";
        array_key_exists('name4',$res)?$pagename['name4']=$res['name4']:$pagename['name4']="page4";
        array_key_exists('name5',$res)?$pagename['name5']=$res['name5']:$pagename['name5']="page5";

        array_key_exists('content1',$res)?(file_exists(FILE_PATH.$res['content1'].".txt")?$contentname=$res['content1']:$contentname="source"):$contentname="source";

        $str = file_get_contents(FILE_PATH.$contentname.".txt");
        $rc['content1']=$str;
        $rc['pagename']=$pagename;
//        echo "<pre>";
//        echo "bus(): <br />";
//        var_dump(bus());
//        echo "dc():  <br />";
//        var_dump(dc());
//        echo "sc():  <br />";
//        var_dump(sc());
//        echo "req(): <br />";
//        var_dump(req());
        view('',$rc);
    }

    public function doHello()
    {
        echo "hello world from hello";
    }

    public function doWorld()
    {
        echo "hello world from world";
        var_dump(bus());
    }

    public function doIndex_ext()
    {
        echo "hello world from index_ext";
    }

    public function doHello_ext()
    {
        echo "hello world from hello_ext";
    }

    public function doWorld_ext()
    {
        echo "hello world from world_ext";
    }

}