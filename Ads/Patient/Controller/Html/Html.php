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
            $this->insertContacts($insert);
            //添加
            if(!empty($insert)){
                server('db')->autoExecute('patient',$insert,'INSERT');
                $this->insertQuestion($insert);
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
        //插入user表
        server('db')->autoExecute('user',$res,'UPDATE',"userId = $id");
        if(!empty($res)){
            foreach($res as $k=>$v){
                if(!empty($v)||$v=='0'){    //传输过来的0是string类型
                    $insert[$k]=$v;
                }
            }
        }
        //更新patient表
        if(!empty($insert)){
            server('db')->autoExecute('patient',$res,'UPDATE',"userId = $id");
            //TODO:未验证是否插入或更改成功
            $this->updateContacts($res);
            $res['userId']=$id;
            $this->insertContacts($res);
            //对question表进行更新操作
            $this->isExistQuestion($id)?$this->updateQuestion($res,$id):$this->insertQuestion($res);
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
        $contacts = $this->getContacts($id);
        $question = $this->doGetquestion($id);
        if(!empty($question)){
            if($question['diseaseList']){
                $question['diseaseList']=explode(',',$question['diseaseList']);
            }
        }
        $firstContact=array();
        if(!empty($contacts)){
            $firstContact = $contacts[0];
            unset($contacts[0]);
        }
        return  server('Smarty')->ads('patient/html/edit')->fetch('',[
           'row' => $row,
            'org'=>$org,
            'disease'=>$disease,
            'patientGroupId'=>$patientGroupId,
            'contacts'=>$contacts,
            'firstContact'=>$firstContact,
            'question'=>$question
        ]);
    }
    //异步删除联系人
    public function doContactsdeletePost()
    {
        if($this->deleteContacts(req('Post')['contactsId'])){
            $this->AjaxReturn([
                'code'=>200,
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
            ]);
        }
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
        $check = server('Db')->autoExecute('user',$insert,'INSERT');
        $userId = null;
        if($check)$userId = server('Db')->insert_id();
        return $userId;
    }

    //对获取contacts联系人信息进行拆分重组后添加进db
    private function insertContacts($req)
    {
        $check=false;
        foreach($req['contact'] as $v){
            $filter =array_filter($v);
            if(!empty($filter))$contacts[]=$filter;
        }
        if(!empty($contacts)){
            $connect = '';
            for($i=0;$i<count($contacts);$i++){
                if(!$contacts[$i]['contactsId']){
                    $contacts[$i]['trueName']=$contacts[$i]['trueName']?:'';
                    $contacts[$i]['relationship']=$contacts[$i]['relationship']?:'';
                    $contacts[$i]['phone']=$contacts[$i]['phone']?:'';
                    $contacts[$i]['userId']=$req['userId'];
                    $connect.="('".implode("','",$contacts[$i])."'),";
                }
            }
            $connect = substr(trim($connect),0,-1);
        }
        if(!empty($connect)){
            $check = server('Db')->query("insert into contacts (`name`,`relationship`,`phone`,`userId`) VALUES $connect");
            if($check)$check=true;
        }
        return $check;
    }
    //对contacts表进行更新操作
    private function updateContacts($req){
        foreach($req['contact'] as $v){
            if($v['contactsId']){
                $contactsId = intval($v['contactsId']);
                $update=[
                    'name'=>$v['trueName'],
                    'phone'=>$v['phone'],
                    'relationship'=>$v['relationship']
                ];
                server('db')->autoExecute('contacts',$update,'UPDATE',"contactsId='{$contactsId}'");
            }
        }
    }
    //获取联系人信息
    public function getContacts($userId)
    {
        $userId = intval($userId);
        $contacts = server('Db')->getAll("select contactsId,userId,name,phone,relationship from contacts where userId='{$userId}'");
        return $contacts?:[];
    }

    //删除联系人
    public function deleteContacts($contactsId)
    {
        $contactsId = intval($contactsId);
        $check = server('Db')->query("delete from contacts where contactsId='{$contactsId}'");
        return $check?true:false;
    }

    public function insertQuestion($req)
    {
        $check=server('Db')->autoExecute('question',$req,'INSERT');
        return $check?true:false;
    }

    public function updateQuestion($req,$id)
    {
        if($req['diseaseList']){
            $req['diseaseList'] = implode(',',$req['diseaseList']);
        }
        $check = server('Db')->autoExecute('question',$req,'UPDATE',"userId = $id");
        return $check?true:false;
    }

    public function isExistQuestion($id)
    {
        $question=$this->doGetquestion($id);
        return empty($question)?false:true;
    }

    public function doGetquestion($id)
    {
        $userId =intval($id);
        $question = server('Db')->getRow("select * from question where userId='{$userId}'");
        return $question?:[];
    }

}
