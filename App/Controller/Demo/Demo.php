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
        //echo "hello world from index";
        view('',[
            
        ]);
    }

    public function doHello()
    {
        echo "hello world from hello";
    }

    public function doWorld()
    {
        echo "hello world from world";
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