<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-12
 * Time: 11:49
 */

namespace Addons\Controller;


class Nurse
{

    use \Addons\Traits\AjaxReturn;

    //手机号验证后直接注册
    public function doValidateloginPost()
    {
        $req = req('Post');
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
    //注册
    public function doRegisterpatientPost()
    {
        $req = req('Post');
        if(model('Patient')->insertInvalidPatient($req)){
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
    //添加
    public function doAddpatientPost()
    {
        $login = req('Post')['login'];
        $orgId = req('Post')['orgId'];
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
    }
    //列表
    public function doGetpatientlistPost()
    {
        $orgId = req('Post')['orgId'];
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
    //搜索
    public function doSearchpatientPost()
    {
        $trueName = req('Post')['trueName'];
        $orgId = req('Post')['orgId'];
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
    //添加联系人
    public function doAddcontactsPost()
    {
        $req = req('Post');
        $check = model('Contacts')->addContacts($req);
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
    //删除联系人
    public function doDeletecontactsPost()
    {
        $userId=req('Post')['userId'];
        $contactsId = req('Post')['contactsId'];
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
    //添加病例
    public function doAddcasesPost()
    {
        $req = req('Post');
        $check = model('Cases')->insertInvalidCases($req);
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
    //删除病例
    public function doDeletecasesPost()
    {
        $caseId=req('Post')['caseId'];
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
    //添加维护计划
    public function doAddmeasureplanPost()
    {
        $req = req('Post');
        $check =  model('Nurse')->insertInvalidMeasurePlan($req);
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
    //删除维护计划
    public function doDeletemeasureplanPost()
    {
        $userId=req('Post')['userId'];
        $planId=req('Post')['planId'];
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
    //获取患者详细信息
    public function doGetpatientdetailPost()
    {
        $userId=req('Post')['userId'];
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
    //获取患者的病例
    public function doGetpatientcasesPost()
    {
        $userId=req('Post')['userId'];
        $orgId=req('Post')['orgId'];
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
    //获取患者的联系人
    public function doGetpatientcontactsPost()
    {
        $userId=req('Post')['userId'];
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
    //获取患者的测量计划
    public function doGetpatientmeasureplanPost()
    {
        $userId=req('Post')['userId'];
        $data = model('Measureplan')->getAfterMeasurePlan2($userId);
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

}