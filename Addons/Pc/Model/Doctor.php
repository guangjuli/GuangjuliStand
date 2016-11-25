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
    //获取患者列表，获取用户关联对象的列表信息    ,添加查询功能
    public function getPatientList($orgId,$doctorId,$page,$num,$field=null,$sort=null,$trueName=null)
    {
        $page = intval($page)-1;
        $num = intval($num);
        $returnList = array();
        //获取userId列表
        $userIdList = model('User')->getPatientListByOrgId($orgId,$trueName);
        foreach($userIdList as $k=>$v){
            if($data = server('cache')->get($v)){
                if($data!=$doctorId)unset($userIdList[$k]);
            }
        }
        //拼排序条件
        $fieldSort = '';
        if($field){
            $fields = ['age','trueName','createTime','newsType','gender'];
            if(in_array($field,$fields)){
                if($fields!='trueName'){
                    $fieldSort=$sort?",{$field} asc":",{$field} desc";
                }else{
                    $fieldSort=$sort?",convert(trueName using gbk) asc ":",convert(trueName using gbk) desc";
                }
            }
        }
        //获取消息列表数据
        if($userIdList){
            $list = '('.implode(',',$userIdList).')';
            $newsList=server('Db')->getAll("select p.userId,age,trueName,gender,newsType,createTime,planId,newsId from patient p ,news n where p.userId in {$list}
                and p.userId = n.userId order by newsType desc {$fieldSort} limit {$page},{$num}");
            $total = model('Patient')->getUserList($userIdList);
            $newsList = $newsList?:[];
            $newsNum = count($newsList);
            $returnList['number'] = $total['number'];
            $returnList['averageAge']= $total['averageAge'];
            $returnList['news']= $newsNum;
            $returnList['patientList'] = [];
            foreach($newsList as $k=>$v){
                $newsList[$k]['userId'] = intval($v['userId']);
                $newsList[$k]['age'] = intval($v['age']);
                $newsList[$k]['newsId'] = intval($v['newsId']);
                $newsList[$k]['newsType']=intval($v['newsType']);
                $newsList[$k]['planId']=intval($v['planId']);
                $newsList[$k]['createTime']=intval($v['createTime']);
            }
            $returnList['patientList']= $newsList;
        }
        return $returnList;
    }

    //根据姓名判断该医生是否存在
    public function isExistDoctor($doctorName,$orgId)
    {
        $doctorName = saddslashes($doctorName);
        $orgId = intval($orgId);
        $check = server('Db')->getOne("select u.userId from user u,doctor d where u.userId=d.userId and orgId={$orgId} and doctorName='{$doctorName}' and u.active=1");
        $check?true:false;
    }

    //消息列表查询患者
    public function searchPatient($trueName,$orgId)
    {

    }
}