<?php
namespace Ads\Organization\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = fc('getOrganizationList');
        return  server('Smarty')->ads('organization/html/list')->fetch('',[
            'list' => $list
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from organization WHERE orgId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //D($res);
        server('db')->autoExecute('organization',$res,'INSERT');
        R('/man/?organization/html/list');

    }

    public function doAdd(){

        return  server('Smarty')->ads('organization/html/add')->fetch('',[
        ]);
    }

    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['orgId']);
        server('db')->autoExecute('organization',$res,'UPDATE',"orgId = $id");
        R('/man/?organization/html/list');
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);
        $row = fc('getOrgInfoById',$id);
        return  server('Smarty')->ads('organization/html/edit')->fetch('',[
            'row' => $row
        ]);
    }


    //获取组织列表
    public function doGetorganizationlist()
    {
        $list = server('db')->getAll("select * from `organization` order by sort desc,orgId desc");
        return $list?:[];
    }

    //根据id获取组织信息
    public function doGetorginfobyid($id)
    {
        $id=intval($id);
        $row = server('db')->getrow("select * from organization where orgId = $id");
        return $row?:[];
    }

    //获取机构的map集合
    public function doGetorgmapidtoname()
    {
        $org = server('Db')->getMap("select orgId,orgName from organization where active=1");
        return $org?:[];
    }

    //根据array id获取组织机构信息
    public function doGetorginfobyarrayid(array $orgId)
    {
        if(empty($orgId))return [];
        $stringOrg = '('.implode(',',$orgId).')';
        $organization = server('Db')->getAll("select `orgId`,`orgName`,`orgAddr` from `organization` where `orgId`in {$stringOrg} and active=1",'orgId');
        return $organization?:[];
    }

}
