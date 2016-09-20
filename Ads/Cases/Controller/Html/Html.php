<?php
namespace Ads\Cases\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }



    //患者列表
    public function doList(){
        $list = server('Db')->getMap("select userId,count(*) as num from `case` group by userId order by sort desc,caseId desc");
        //多表查询，user表，user_info表
        $user = server('Db')->getAll("select u.userId,login,age,trueName,gender,addr from user u ,patient p where u.userId = p.userId",'userId');
        $newList = array();
        foreach($list as $k=>$v){
            if($user[$k]){
                $user[$k]['num']=$v;
                $newList[] = $user[$k];
            }
        }
        return  server('Smarty')->ads('cases/html/list')->fetch('',[
            'list' => $newList
        ]);
    }
    //患者病历列表
    public function doDetail()
    {
        $userId=req('Get')['id'];
        $userId = intval($userId);
        //查询病例
        $cases = server('Db')->getAll("select * from `case` where `userId`='{$userId}' order by beginTime desc");
        $cases = $cases?:[];
        //获取具体的就诊医院详情
        $org = array();
        for($i=0;$i<count($cases);$i++){
            if(!in_array($cases[$i]['orgId'],$org)){
                $org[]=$cases[$i]['orgId'];
            }
        }
        if(!empty($org)){
            $stringOrg = '('.implode(',',$org).')';
            $organization = server('Db')->getAll("select `orgId`,`orgName`,`orgAddr` from `organization` where `orgId`in {$stringOrg}",'orgId');
        }
        //获取用户信息
        return  server('Smarty')->ads('cases/html/detail')->fetch('',[
            'list' => $cases,
            'organization'=>$organization
        ]);
    }
    //患者病历详情
    public function doCases()
    {
        $caseId = req('Get')['id'];
        $caseId = intval($caseId);
        $cases = server('Db')->getRow("select * from `case` where `caseId`='{$caseId}'");
        //初始化返回参数
        $doctor=array();
        $organization = array();
        if($cases){
            $doctor = server('Db')->getRow("select trueName,login,gender,age,office,jobTitle from doctor d,user u where u.userId=d.userId and u.userId = {$cases['doctorId']}");
            $organization = server('Db')->getRow("select orgName,orgAddr from organization where orgId = '{$cases['orgId']}'");
        }
        return  server('Smarty')->ads('cases/html/cases')->fetch('',[
            'list' => $cases,
            'organization'=>$organization,
            'doctor'=>$doctor
        ]);
    }
    /**
     * 单个病历删除
     */
    public function doDetaildelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from `case` WHERE caseId = $id");
        $this->AjaxReturn([
        ]);
    }
    /**
     * 某人名下所有病历删除
     */
    public function doListdelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from `case` WHERE userId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        $res['userId'] = $this->checkAddPost($res);
        $res['doctorId']=$this->checkDoctor($res['doctorName'],$res['orgId']);
        server('db')->autoExecute('`case`',$res,'INSERT');
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?cases/html/list'
        ]);
    }

    //TODO:查询用户显示界面异常
    private function checkAddPost($res)
    {
        $userId = null;
        if(empty($res['sideEffect']))$msg['sideEffect']='不能为空';
        if(empty($res['medication']))$msg['medication']='不能为空';
        if(empty($res['disease']))$msg['disease']='不能为空';
        if(empty($res['doctorName']))$msg['doctorName']='不能为空';
        if(application('Validate')->validatePhone($res['check'])){
            $userId = server('Db')->getOne("select userId from user where `login`='{$res['check']}'");
            if(empty($userId)){
                $msg['check']='指定患者不存在';
            }
        }else{
            $msg['check']='请输入正确的手机号';
        }
        if(!empty($msg)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
        return $userId;
    }

    public function doAdd(){
        $row['org'] = server('Db')->getMap("select orgId,orgName from `organization`");
        return  server('Smarty')->ads('cases/html/add')->fetch('',[
            'row'=>$row
        ]);
    }

    public function doCheckuserPost()
    {
        $check = req('Post')['check'];
        //判断是否为手机号，是进行login条件查询，
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
        //对医生资格的审查
        $userId = $this->checkDoctor($res['doctorName'],$res['orgId']);
        //插入cases表
        $caseId = $res['caseId'];
        unset($res['caseId']);
        $res['doctorId']=$userId;
        server('db')->autoExecute('`case`',$res,'UPDATE',"caseId = '{$caseId}'");
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?cases/html/list'
        ]);
    }

    public function doEdit(){
        $userId = intval(req('Get')['userId']);
        $caseId = intval(req('Get')['caseId']);
        $patient=$this->getPatientInfo('user',"userId={$userId}");
        $row = server('db')->getrow("select * from `case` where `caseId` = {$caseId}");
        if($row['doctorId']){
            $row['doctorName'] = server('Db')->getOne("select `trueName` from doctor where `userId` = '{$row['doctorId']}'");
        }
        if($row['orgId']){
            $row['org'] = server('Db')->getMap("select orgId,orgName from `organization`");
        }
        return  server('Smarty')->ads('cases/html/edit')->fetch('',[
            'row' => $row,
            'patient'=>$patient
        ]);
    }

    private function checkDoctor($doctorName,$orgId)
    {
        $userId = server('Db')->getOne("select userId from doctor where `trueName`='{$doctorName}'");
        if($userId){
            $IdList = server('Db')->getRow("select `userId`,`groupId`,`orgId` from user where `userId`='{$userId}'") ;
            $doctorId = server('Db')->getOne("select `groupId` from  user_group where groupChr='doctor'");
            if($doctorId!=$IdList['groupId']||$IdList['orgId']!=$orgId){
                $this->AjaxReturn([
                    'code'=>-201,
                    'msg'=>[
                        'doctorName'=>'医生和医院信息不一致'
                    ]
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code'=>-202,
                'msg'=>[
                    'doctorName'=>'该医生不存在'
                ]
            ]);
        }
        return $userId;
    }
    //获取患者信息
    private function getPatientInfo($table,$where){
        $patient = array();
        $sql = "select u.userId,login,trueName,gender,addr from user u,patient us
                        where u.userId=us.userId and u.userId=(select userId from {$table} where {$where})";
        $row = server('Db')->getRow($sql);
        if($row){
            $patient['mysql'] = $row;
            $relationship=server('Db')->getAll("select name,phone,relationship from contacts where userId = {$row['userId']}");
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
