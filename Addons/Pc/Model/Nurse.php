<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 14:39
 */

namespace Addons\Model;


class Nurse
{
    //获取患者档案
    public function getPatientInfo($userId)
    {
        //分别获取对应的参数
        $orgId = model('User')->getOrgIdByUserId(bus('tokenInfo')['userId']);
        $userBasic = model('Patient')->getCutUserInfo($userId,$orgId);
        if($userBasic){
            $cases = model('Cases')->getPersonalCases($userId,$orgId);
            $contacts = model('Contacts')->getContacts($userId);
            $userBasic['contacts']=$contacts;
            $userBasic['diseaseList'] = $cases;
        }
        return $userBasic;
    }

    private function getRandChar($length,$strPol){
        $str = null;
        $max = strlen($strPol)-1;
        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }

    //自动生成login登录，临时用户
    private function getUserLogin()
    {
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        return $this->getRandChar(11,$strPol);
    }

    //生成临时用户密码
    private function getPassword()
    {
        $strPol = "0123456789abcdefghijklmnopqrstuvwxyz";
        return $this->getRandChar(6,$strPol);
    }

    //获取本医院所有的患者列表
    public function getHosPatientList($orgId)
    {
        $orgId = intval($orgId);
        $patientList = server('Db')->getAll("select trueName,gender,age,u.userId from user u,patient p  where u.userId=p.userId and orgId={$orgId}");
        return $patientList?:[];
    }

    //获取本医院当前测量计划map
    public function getNoDetectionMap(array $userIdList)
    {
        $time = date('Ymd',time());
        $userIdString='('.implode(',',$userIdList).')';
        $noDetection = server('Db')->getMap("select `userId`, `noDetection` from measure_plan where
            userId in {$userIdString} and beginTime<'{$time}' and endTime>'{$time}'");
        foreach($noDetection as $k=>$v){
            $detection = unserialize($v);
            array_count_values($detection);
        }
        return $noDetection?:[];
    }

    //获取护士界面患者显示列表
    public function getShowHosPatientList($orgId)
    {
        $patientList = $this->getHosPatientList($orgId);
        if($patientList){
            $userIdList = array();
            foreach($patientList as $v){
                $userIdList[] = $v['userId'];
            }
            if($userIdList){
                $noDetection = $this->getNoDetectionMap($userIdList);
                foreach($patientList as $k=>$v){
                    $patientList[$k]['noDetection'] = $noDetection[$v['userId']]?:0;
                }
            }
        }
        return $patientList;
    }

    //搜索某个人的列表显示信息
    public function searchPatient($trueName,$orgId)
    {
        $trueName = saddslashes($trueName);
        $orgId = intval($orgId);
        $row = server('Db')->getRow("select u.userId,trueName,age,gender from user u,patient p where trueName='{$trueName}' and orgId={$orgId}");
        if($row){
            $time = date('Ymd',time());
            $noDetection = server('Db')->getOne("select  `noDetection` from measure_plan where
            userId = {$row['userId']} and beginTime<'{$time}' and endTime>'{$time}'");
            $row['noDetection'] = $noDetection?:0;
        }
        return $row?:[];
    }

    //添加患者
    public function addPatient($orgId,$login)
    {
        $orgId = intval($orgId);
        $login = saddslashes($login);
        $check = server('Db')->query("update user set orgId={$orgId} where login='{$login}'");
        return $check?true:false;
    }

    //注册患者和患者详情
    public function insertUser($req)
    {
        $req['password'] = $this->getPassword();
        $map = model('Usergroup')->getMapUserGroup();
        $req['groupId'] = $map['casualUser'];
        $req['active']=0;
        $userId=model('User')->insertUser($req);
        return $userId?:null;
    }

    //更改用户信息状态
    public function updateUserState($userId)
    {
        model('Cases')->updateCasesActiveByUserId($userId);
        model('Contacts')->updateContactsActiveByUserId($userId);
        model('Measureplan')->updateMeasurePlanActiveByUserId($userId);
    }
}