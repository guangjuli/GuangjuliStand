<?php
namespace Ads\Cases\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('Db')->getAll("select * from `case` order by sort desc,caseId desc");
        //多表查询，user表，user_info表
        $user = server('Db')->getAll("select u.userId,login,trueName,gender from user u ,user_info",'userId');
        $newList = array();
        for($i=0;$i<count($list);$i++){
            if($user[$list[$i]['userId']]){
                $newList[] = array_merge($user[$list[$i]['userId']],$list[$i]);
            }
        }
        return  server('Smarty')->ads('cases/html/list')->fetch('',[
            'list' => $newList
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from case WHERE caseId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        server('db')->autoExecute('case',$res,'INSERT');
        R('/man/?cases/html/list');

    }

    public function doAdd(){

        return  server('Smarty')->ads('cases/html/add')->fetch('',[
        ]);
    }

    public function doCheckuserPost()
    {
        $check = req('Post')['check'];
        //判断是否为手机号，是进行login条件查询，否则进行trueName查询
        if(application('Validate')->validatePhone($check)){
            $this->returnPatientInfo('user',"login = $check");
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'请输入患者已注册账户的手机号'
            ]);
        }
    }

    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['groupId']);//

        //D($res);
        server('db')->autoExecute('user_group',$res,'UPDATE',"groupId = $id");
        R('/man/?usergroup/html/list');
    }

    public function doEdit(){
        $id = intval(req('Get')['id']);
        $row = server('db')->getrow("select * from user_group where groupId = $id");
        return  server('Smarty')->ads('usergroup/html/edit')->fetch('',[
            'row' => $row
        ]);
    }

    //获取患者信息
    private function getPatientInfo($table,$where){
        $patient = array();
        $sql = "select u.userId,login,trueName,gender,addr from user u,user_info us
                        where u.userId=us.userId and u.userId=(select userId from {$table} where {$where})";
        $row = server('Db')->getRow($sql);
        if($row){
            $patient['mysql'] = $row;
            $relationship=server('Db')->getAll("select name,phone1,phone2,relationship from contacts where userId = {$row['userId']}");
            //输出前端特定id,方便循环显示
            if($relationship){
                $new = array();
                foreach($relationship as $k=>$v){
                    foreach($v as $kk=>$vv){
                        $new[$k][$kk.$k] =$vv;
                    }
                }
                $patient['contacts'] = $new;
            }
        }
        return $patient;
    }
    //向叶面返回患者信息
    private function returnPatientInfo($table,$where){
        $patient=$this->getPatientInfo($table,$where);
        if(!empty($patient)){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>$patient
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'指定患者不存在'
            ]);
        }
    }
}
