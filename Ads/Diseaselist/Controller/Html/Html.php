<?php
namespace Ads\Diseaselist\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = fc('getDiseaseList');
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
        $id = intval($res['diseaseId']);
        server('db')->autoExecute('disease_list',$res,'UPDATE',"diseaseId = $id");
        R('/man/?diseaselist/html/list');
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);
        $row = fc("getDiseaseListInfoById",$id);
        return  server('Smarty')->ads('diseaselist/html/edit')->fetch('',[
            'row' => $row
        ]);
    }

    //获取疾病列表
    public function doGetdiseaselist()
    {
        $list = server('db')->getAll("select * from `disease_list` order by diseaseId");
        return $list?:[];
    }

    //通过疾病id获取详情
    public function doGetdiseaselistinfobyid($diseaseId)
    {
        $diseaseId = intval($diseaseId);
        $row = server('db')->getrow("select * from disease_list where diseaseId = {$diseaseId}");
        return $row?:[];
    }

    //获取问卷调查疾病map集合
    public function doGetdiseaselistmapidtoname()
    {
        $disease = server('Db')->getMap("select diseaseId,diseaseName from disease_list where active=1");
        return $disease?:[];
    }

}
