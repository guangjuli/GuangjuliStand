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

    public function addPatient($req)
    {
        //临时用户，用户组
        $groupId = server()->Config('V')['userGroup']['casualUser'];
        //获取患者的orgId
        $orgId = model('User')->getOrgIdByUserId(bus('tokenInfo')['userId']);
        //添加到user表
        $login = $this->getUserLogin();
        $password = $this->getPassword();
        $user=[
          'login'=>$login,
          'password'=>$password,
          'groupId'=>$groupId,
          'orgId'=>$orgId
        ];
        $userId=model('User')->insertUserReturnId($user);
        if($userId){
            $check = model('Patient')->insertUserInfo($req,$userId);
            if($check){
                return[
                    'login'=>$login,
                    'password'=>$password
                ];
            }
        }
        return [];
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


}