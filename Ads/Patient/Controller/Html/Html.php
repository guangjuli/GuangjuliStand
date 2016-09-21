<?php
namespace Ads\Patient\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }

//adsdata('sd/sdf/dfs/')
//{widget ads='userinfo/crop/Uploadimage'}


    //TODO:添加和编辑只对userId进行了后端校验，其他科校验的在前端校验，后端未校验

    public function doIndex()
    {

    }

    public function doList(){
        $list = server('db')->getall("select * from `patient` p ,user u where p.userId=u.userId order by p.sort desc,userInfoId desc");
        return  server('Smarty')->ads('patient/html/list')->fetch('',[
            'list' => $list
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from patient WHERE userInfoId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //校验userId
        $this->validateUser($res);
        //插入user返回userId
        $userId = $this->insertUser($res);
        //去除空值
        if($userId){
            if(!empty($res)){
                foreach($res as $k=>$v){
                    if(!empty($v)||$v=='0'){    //传输过来的0是string类型
                        $insert[$k]=$v;
                    }
                }
            }
            $insert['userId']=$userId;
            //添加
            if(!empty($insert)){
                server('db')->autoExecute('patient',$insert,'INSERT');
            }
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'',
                'url'=>'/man/?patient/html/list'
            ]);
        }
    }
//            "userInfo_cropImage"         => 'Userinfo/Widget/Cropimage',


    public function doAdd(){
        $org = $this->getOrgMap();
        $disease = $this->getDiseaseListMap();
        $patientGroupId = $this->getPatientGroupIdMap();
        return server('Smarty')->ads('patient/html/add')->fetch('',[
            'org'=>$org,
            'disease'=>$disease,
            'patientGroupId'=>$patientGroupId
        ]);
    }

    //校验用户参数
    //适用于添加用户和编辑用户
    private function validateUser(Array $req)
    {
        //校验电话格式
        if(application('Validate')->validatePhone($req['login'])){
            $login = $req['login'];
            $checkUserId = server('Db')->getOne("select `userId` from user where `login` = '{$login}'");
            if($checkUserId){
                $msg['login']='该手机号已注册';
            }
        }else{
            $msg['login']='请正确输入';
        }
        if(!application('Validate')->validateNumberLetter($req['password']))$msg['password']='密码格式错误';
        if($req['password']!=$req['confirm_password'])$msg['confirm_password']='两次输入不一致';
        if(!empty($msg)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
    }


    //编辑
    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['userId']);//
        //校验userId
        if(!application('Validate')->validateNumberLetter($res['password']))$msg['password']='密码格式错误';
        if($res['password']!=$res['confirm_password'])$msg['confirm_password']='两次输入不一致';
        if(!empty($msg)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
        server('db')->autoExecute('user',$res,'UPDATE',"userId = $id");
        if(!empty($res)){
            foreach($res as $k=>$v){
                if(!empty($v)||$v=='0'){    //传输过来的0是string类型
                    $insert[$k]=$v;
                }
            }
        }
        if(!empty($insert)){
            server('db')->autoExecute('patient',$res,'UPDATE',"userId = $id");
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'',
                'url'=>'/man/?patient/html/list'
            ]);
        }
    }

    public function doEdit(){
        $id = intval(req('Get')['userId']);
        $row = server('db')->getrow("select * from `patient` p ,user u where p.userId=u.userId and p.userId = $id");
        $org = $this->getOrgMap();
        $disease = $this->getDiseaseListMap();
        $patientGroupId = $this->getPatientGroupIdMap();
        return  server('Smarty')->ads('patient/html/edit')->fetch('',[
           'row' => $row,
            'org'=>$org,
            'disease'=>$disease,
            'patientGroupId'=>$patientGroupId
        ]);
    }

    //详情
    public function doDetail()
    {
        $id = intval(req('Get')['userId']);
        $row = server('Db')->getRow("select * from patient where `userId`={$id}");
        $source  = $_SERVER['SERVER_NAME'];
        $row['gravatar'] = 'http://'.$source.ltrim($row['gravatar'],'.');
        return  server('Smarty')->ads('patient/html/detail')->fetch('',[
            'row' => $row
        ]);
    }


    //外部Api
    //判断用户信息表user_info对应的id是否存在
    public function isExistUserInfoById($id)
    {
        if(!is_int($id))return false;
        $id = server('Db')->getOne("select `userId` from patient where `userId`=$id");
        return $id?true:false;
    }

    //获取机构的map集合
    public function getOrgMap()
    {
        $org = server('Db')->getMap("select orgId,orgName from organization where active=1");
        return $org?:[];
    }

    //获取问卷调查疾病map集合
    public function getDiseaseListMap()
    {
        $disease = server('Db')->getMap("select diseaseId,diseaseName from disease_list where active=1");
        return $disease?:[];
    }

    //获取患者groupId的map集合
    public function getPatientGroupIdMap()
    {
        $patientId = server('Db')->getMap("select groupId,groupName from user_group where chr in('ios','android')");
        return $patientId?:[];
    }

    public function insertUser($req)
    {
        $insert=[
          'login'=>$req['login'],
          'password'=>$req['password'],
          'orgId'=>$req['orgId'],
          'groupId'=>$req['groupId']
        ];
        $check = server('db')->autoExecute('user',$insert,'INSERT');
        $userId = null;
        if($check)$userId = server('Db')->insert_id();
        return $userId;
    }

}
