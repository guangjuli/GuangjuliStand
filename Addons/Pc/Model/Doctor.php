<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 9:07
 */

namespace Addons\Model;


class Doctor
{
    //获取患者档案
    public function getArchives($userId,$orgId)
    {
        $archives = array();
        //获取患者信息
        $info = model('Userinfo')->getCutUserInfo($userId,$orgId);
        //病历可能为空，患者信息不能为空
        if(!empty($info)){
            //获取患者病历
           $cases = model('Cases')->getCasesByUserId($userId,$orgId);
           $cases=$cases?:[];
           $ar['patientList']=$cases;
           $archives = array_merge($ar,$info);
        }
        return $archives;
    }

    //TODO:待修改
    //获取患者列表，获取用户关联对象的列表信息
    public function getPatientList($orgId)
    {
        $returnList = array();
        //获取userId列表
        $userIdList = model('User')->getUserListByOrgId($orgId);
        //获取用户列表
        $patientList = model('Patient')->getUserList($userIdList);
        $list  =$patientList['patientList'];
        //消息列表
        $newsList = model('News')->getNewsList($userIdList);
        if(!empty($patientList)){
            $newsNum = count($newsList);
            $returnList['number'] = $patientList['number'];
            $returnList['averageAge']= $patientList['averageAge'];
            $returnList['news']= $newsNum;
            $returnList['patientList'] = [];
            for($i=0;$i<$newsNum;$i++){
                $userInfo = $list[$newsList[$i]['userId']];
                if($userInfo){
                    $returnList['patientList'] = array_merge($userInfo,$newsList[$i]);
                }
            }
        }
        return $returnList;
    }


}