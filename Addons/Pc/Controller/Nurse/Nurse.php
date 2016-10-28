<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-12
 * Time: 11:49
 */

namespace Addons\Controller;


class Nurse extends BaseController
{

    use \Addons\Traits\AjaxReturn;

    public function __construct()
    {
        parent::__construct();
    }

    //手机号验证后直接注册   ok
    public function doValidateloginPost()
    {
        $req = json_decode(req('Post'));
        //校验是否为手机号
        if(!model('Validate')->validatePhone($req['login'])){
            $this->AjaxReturn([
                'code'=>-201,
                'msg'=>'手机号不正确'
            ]);
        }
        //校验手机号是否存在
        if(model('User')->isExistUserByLogin($req['login'])){
            $this->AjaxReturn([
                'code'=>-202,
                'msg'=>'该用户已存在'
            ]);
        }
        $userId=model('Nurse')->insertUser($req);
        if(!$userId){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'register fail'
            ]);
        }
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'succeed',
            'data'=>[
                'userId'=>$userId
            ]
        ]);
    }
    //注册    ok
    public function doRegisterpatientPost()
    {
        $req = json_decode(req('Post'));
        if(!model('Patient')->isExistUserInfoById($req['userId'])){
            if(model('Patient')->insertInvalidPatient($req)){
                model('Question')->insertQuestion($req);
                model('Nurse')->updateUserState($req['userId']);
                $user = model('User')->getUserInfoByUserId($req['userId']);
                model('Sms','register')->sendMessage($user['login'],$user['password']);
                $this->AjaxReturn([
                    'code'=>200,
                    'msg'=>'succeed',
                    'data'=>[
                        'login'=>$user['login'],
                        'password'=>$user['password']
                    ]
                ]);
            }else{
                $this->AjaxReturn([
                    'code'=>-200
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code'=>-201,
                'msg'=>'The patient has been registered'
            ]);
        }
    }
    //保存
    public function doSavepatientPost()
    {
        $req = json_decode(req('Post'));
        if(model('Patient')->updatePatient($req,$req['userId'])){
            model('Question')->updateQuestion($req);
            model('Nurse')->updateUserState($req['userId']);
            $this->AjaxReturn([
                'code'=>200
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //重置
    public function doResetpatientPost()
    {
        $req = json_decode(req('Post'));
        $userId = $req['userId'];
        model('Nurse')->deleteInvalidUserInfo($userId);
        $this->AjaxReturn([
           'code'=>200
        ]);
    }
    //添加   ok
    public function doAddpatientPost()
    {
        $req = json_decode(req('Post'));
        $login = $req['login'];
        $orgId = $req['orgId'];
        if(model('Validate')->validatePhone($login)){
            if(model('User')->isExistUserByLogin($login)){
                if(model('Nurse')->addPatient($orgId,$login)){
                    $this->AjaxReturn([
                        'code'=>200
                    ]);
                }else{
                    $this->AjaxReturn([
                        'code'=>-200
                    ]);
                }
            }else{
                $this->AjaxReturn([
                    'code'=>-201,
                    'msg'=>'The patient does not exist'
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code'=>-202,
                'msg'=>'Please enter a correct phone number'
            ]);
        }
    }
    //列表      ok
    public function doGetpatientlistPost()
    {
        $req = json_decode(req('Post'));
        $orgId = $req['orgId'];
        $patientList = model('Nurse')->getShowHosPatientList($orgId);
        if($patientList){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$patientList
            ]);
        }else{
            $this->AjaxReturn([
               'code'=>-200,
                'msg'=>'no data'
            ]);
        }
    }
    //搜索    ok
    public function doSearchpatientPost()
    {
        $req = json_decode(req('Post'));
        $trueName = $req['trueName'];
        $orgId = $req['orgId'];
        $patient = model('Nurse')->searchPatient($trueName,$orgId);
        if($patient){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$patient
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data'
            ]);
        }
    }
    //添加联系人   ok
    public function doAddcontactsPost()
    {
        $req = json_decode(req('Post'));
        $id = model('Contacts')->addContacts($req);
        if($id){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>[
                    'contactsId'=>$id
                ]
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //删除联系人   ok
    public function doDeletecontactsPost()
    {
        $req = json_decode(req('Post'));
        $userId= $req['userId'];
        $contactsId = $req['contactsId'];
        $check = model('Contacts')->deleteContacts($userId,$contactsId);
        if($check){
            $this->AjaxReturn([
                'code'=>200
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //添加病例      ok
    public function doAddcasesPost()
    {
        $req = json_decode(req('Post'));
        $id = model('Cases')->insertInvalidCases($req);
        if($id){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>[
                    'caseId'=>$id
                ]
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //删除病例      ok
    public function doDeletecasesPost()
    {
        $req = json_decode(req('Post'));
        $caseId= $req['caseId'];
        $check = model('Cases')->deleteCases($caseId);
        if($check){
            $this->AjaxReturn([
                'code'=>200
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //添加维护计划     ok
    public function doAddmeasureplanPost()
    {
        $req = json_decode(req('Post'));
        $id =  model('Measureplan')->insertInvalidMeasurePlan($req);
        if($id){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>[
                    'planId'=>$id
                ]
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //删除维护计划     ok
    public function doDeletemeasureplanPost()
    {
        $req = json_decode(req('Post'));
        $userId=$req['userId'];
        $planId=$req['planId'];
        $check = model('Measureplan')->deleteMeasurePlan($userId,$planId);
        if($check){
            $this->AjaxReturn([
                'code'=>200
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //获取患者详细信息   ok
    public function doGetpatientdetailPost()
    {
        $req = json_decode(req('Post'));
        $userId= $req['userId'];
        $data = model('Patient')->getUsrInfoDetailByUserId($userId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取患者的病例     ok
    public function doGetpatientcasesPost()
    {
        $req = json_decode(req('Post'));
        $userId= $req['userId'];
        $orgId= $req['orgId'];
        $data = model('Cases')->getPersonalCases($userId,$orgId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取患者的联系人    ok
    public function doGetpatientcontactsPost()
    {
        $req = json_decode(req('Post'));
        $userId= $req['userId'];
        $data = model('Contacts')->getContacts($userId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取患者的测量计划    ok
    public function doGetpatientmeasureplanPost()
    {
        $req = json_decode(req('Post'));
        $userId= $req['userId'];
        $orgId= $req['orgId'];
        $data = model('Measureplan')->getAfterMeasurePlan($userId,$orgId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取未检测项详情
    public function doGetnodetectiondetailPost()
    {
        $req = json_decode(req('Post'));
        $userId= $req['userId'];
        $orgId= $req['orgId'];
        $data = model('Measureplan')->getMeasurePlanNoMeasureProject($userId,$orgId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //搜索药物
    public function doSearchmedicinePost()
    {
        $req = json_decode(req('Post'));
        $data = model('Medicine')->searchMedicine($req);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //测试
    public function doTest()
    {
        view('',[]);
    }
}