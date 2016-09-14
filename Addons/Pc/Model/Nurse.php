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
    //获取患者信息
    public function getPatientInfo($userId)
    {
        //分别获取对应的参数
        $userBasic = model('Userinfo')->getCutUserInfo($userId);
        if($userBasic){
            $cases = model('Cases')->getCasesByUserId($userId);
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
        //添加到user表
        $user=[
          'login'=>$this->getUserLogin(),
          'password'=>$this->getPassword(),
          'groupId'=>$groupId
        ];
        $userId=model('User')->insertUserReturnId($user);
        if(!empty($userId)){
            //添加到user_info表
            if(model('Userinfo')->insertUserInfo($req,$userId)){
                //添加到user_relationship表
                $relation = model('Userrelationship')->getUserRelationshipByUserId($userId);
                if($relation){
                    model('Userrelationship')->insertRelationship($relationship,$userId);
                }else{
                    model('Userrelationship')->updateRelationship($relationship,$userId);
                }
                $insertRelation=$relation?$relation.','.$userId:$userId;

            }
        }
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
    public function getUserLogin()
    {
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        return $this->getRandChar(11,$strPol);
    }

    //生成临时用户密码
    public function getPassword()
    {
        $strPol = "0123456789abcdefghijklmnopqrstuvwxyz";
        return $this->getRandChar(6,$strPol);
    }


}