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

    public function addPatient()
    {

    }
    
}