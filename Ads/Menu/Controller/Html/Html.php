<?php
namespace Ads\Menu\Controller\Html;


class Html extends BaseController {

    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }



    public function doIndex(){
    }

    public function doIndexc(){
    }



    public function doList(){
        $topid = intval(req('Get')['topid']);
        $parentid = intval(req('Get')['parentid']);

        if($topid){
            $seclist = app('db')->getall("select * from menu where parentId = $topid order by sort desc,menuId desc");
        }
        if($parentid){
            $list = app('db')->getall("select * from menu where parentId = $parentid order by sort desc,menuId desc");
        }

        $toplist = app('db')->getall("select * from menu where parentId = 0 order by sort desc,menuId desc");

        return  server('Smarty')->ads('menu/html/list')->fetch('',[
            'toplist' => $toplist,
            'seclist' => $seclist,
            'list' => $list,
        ]);
    }

    public function doDelete()
    {
        $id = intval(req('Get')['id']);
        $topid = intval(req('Get')['topid']);
        $parentid = intval(req('Get')['parentid']);

        server('db')->query("delete from menu WHERE menuId = $id");

        $url = "/man/?menu/html/list";
        if($topid) $url .= "&topid=$topid";
        if($parentid) $url .= "&parentid=$parentid";

        $this->AjaxReturn([
            'url' => $url
        ]);
       // R($url);
    }


    public function doAddPost()
    {
        $res = req('Post');
       // D($res);

        server('db')->autoExecute('menu',$res,'INSERT');
        $url = "/man/?menu/html/list";
        R($url);
    }

    public function doAdd(){
        $option = adsdata('/menu/data/Menc');
        return  server('Smarty')->ads('menu/html/add')->fetch('',[
            'option'=> $option
        ]);
    }
    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['id']);
        $topid = intval(req('Post')['retopid']);
        $parentid = intval(req('Post')['reparentid']);


        server('db')->autoExecute('menu',$res,'UPDATE',"menuId = $id");
        $url = "/man/?menu/html/list";
        if($topid) $url .= "&topid=$topid";
        if($parentid) $url .= "&parentid=$parentid";

        R($url);
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);

        $option = adsdata('/menu/data/Menc',$id);

        $row = server('db')->getrow("select * from menu where menuId = $id");
        return  server('Smarty')->ads('menu/html/edit')->fetch('',[
            'row'   => $row,
            'option'=> $option
        ]);
    }



}
