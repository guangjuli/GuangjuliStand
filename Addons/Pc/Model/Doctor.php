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
    public function getArchives($userId)
    {
        $archives = array();
        //获取患者病历
        $cases = model('Cases')->getCasesByUserId($userId);
        //获取患者信息
        $info = model('Userinfo')->getCutUserInfo($userId);
        //病历可能为空，患者信息不能为空
        if(!empty($info)){
           $ar['patientList']=$cases;
           $archives = array_merge($ar,$info);
        }
        return $archives;
    }

    //获取患者列表，获取用户关联对象的列表信息
    public function getPatientList($userId)
    {
        $returnList = array();
        $relation=model('Userrelationship')->getUserRelationshipByUserId($userId);
        //获取用户列表
        $patientList = model('Userinfo')->getUserListByUserId($relation);
        $list  =$patientList['patientList'];
        //消息列表
        $newsList = model('News')->getNewsList($relation);
        if(!empty($patientList)&&!empty($newsList)){
            $newsNum = count($newsList);
            $returnList['number'] = $num = $patientList['number'];
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