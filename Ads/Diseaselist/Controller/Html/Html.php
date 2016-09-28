<?php
namespace Ads\Diseaselist\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('db')->getall("select * from `disease_list` order by diseaseId");
        return  server('Smarty')->ads('diseaselist/html/list')->fetch('',[
            'list' => $list
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from disease_list WHERE diseaseId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //D($res);
        server('db')->autoExecute('disease_list',$res,'INSERT');
        R('/man/?diseaselist/html/list');

    }

    public function doAdd(){

        return  server('Smarty')->ads('diseaselist/html/add')->fetch('',[
        ]);
    }

    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['diseaseId']);//

        //D($res);
        server('db')->autoExecute('disease_list',$res,'UPDATE',"diseaseId = $id");
        R('/man/?diseaselist/html/list');
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);
        $row = server('db')->getrow("select * from disease_list where diseaseId = $id");
        return  server('Smarty')->ads('diseaselist/html/edit')->fetch('',[
            'row' => $row
        ]);
    }

}
