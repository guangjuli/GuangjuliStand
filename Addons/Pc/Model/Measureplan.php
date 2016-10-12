<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 9:09
 */

namespace Addons\Model;

//测量计划
class Measureplan
{
    //插入measure_plan表
    public function insertMeasurePlan($req)
    {
        $req = saddslashes($req);
        //拼装带插入的数据
        $insert['userId']=intval($req['userId']);
        $insert['beginTime']=$req['beginTime'];
        $insert['endTime']=$req['endTime'];
        //去除project的字段
        unset($req['userId']);
        unset($req['beginTime']);
        unset($req['endTime']);
        //转移project字段
        $insert['project']=serialize($req);
        $check = server('Db')->autoExecute('measure_plan', $insert, 'INSERT');
        return $check?true:false;
    }
    //获取测量计划
    //$time 消息列表中的时间
    public function getOldMeasurePlan($time,$userId)
    {
        $userId = intval($userId);
        $plan = $this->getMeasurePlanByTime($time,$userId);
        $id = $plan['planId'];
        if($id){
            $plan = server('Db')->getAll("select * from `measure_plan` where `userId` = {$userId} and `planId`<={$id}");
            $plan=$plan?:[];
            $type = model('Measuretype')->getMeasureTypeMap();
            foreach($plan as $k=>$v){
                if($v['project']){
                    $project=unserialize($v['project']);
                    foreach(array_keys($project)as $value){
                        $v['project'][]=$type[$value];
                    }
                }
            }
        }
        return $plan;
    }
    //获取测量计划的时间范围map
    public function getOldMeasurePlanTimeMap($userId)
    {
        $time = date('Ymd',time());
        $userId = intval($userId);
        $plan = server('Db')->getAll("select planId,beginTime,endTime from measure_plan where endTime<'{$time}' and userId={$userId}",'planId');
        return $plan?:[];
    }

    //删除测量计划
    public function deleteMeasurePlan($userId,$planId)
    {
        $userId = intval($userId);
        $planId = intval($planId);
        $check = server('Db')->sql("delete from measure_plan where `userId`={$userId} and `planId`={$planId}");
        return $check?true:false;
    }
    //获取测量计划的id
    //$time  20160810
    public function getMeasurePlanByTime($time,$userId)
    {
        $userId = intval($userId);
        $plan = server('Db')->getRow("select planId,beginTime,endTime from measure_plan where userId={$userId} and beginTime<'{$time}' and endTime >'{$time}'");
        return $plan?:[];
    }
    //获取即将实施的测量计划
    public function getAfterMeasurePlan($planId,$userId)
    {
        $planId = intval($planId);
        $userId = intval($userId);
        $plan = server('Db')->getAll("select * from `measure_plan` where `userId` = {$userId} and `planId`>={$planId}");
        $plan=$plan?:[];
        $type = model('Measuretype')->getMeasureTypeMap();
        foreach($plan as $k=>$v){
            if($v['project']){
                $project=unserialize($v['project']);
                foreach(array_keys($project)as $value){
                    $v['project'][]=$type[$value];
                }
            }
        }
        return $plan;
    }

    public function isExistMeasurePlan($planId)
    {
        $planId = intval($planId);
        $id = server('Db')->getOne("select planId from measure_plan where planId={$planId}");
        return $id?true:false;
    }

    //通过planId获取时间段
    public function getPlanTimeByPlanId($planId)
    {
        $planId = intval($planId);
        $time = server('Db')->getRow("select planId,beginTime,endTime from measure_plan where planId = {$planId}");
        return $time?:[];
    }

    //将测量计划加入报告中
    public function updateMeasurePlanReportId($reportId,$userId)
    {
        $reportId = intval($reportId);
        $userId = intval($userId);
        $time = date('Ymd',time());
        $measureId = server('Db')->query("update measure_plan set reportId = {$reportId}where beginTime>{$time} and reportId=0 and userId = {$userId}");
        return $measureId?true:false;
    }

    //获取测量计划项目列表
    public function getMeasurePlanProject($planId,$userId)
    {
        $userId = intval($userId);
        $planId = intval($planId);
        $project = server('Db')->getOne("select project from `measure_plan` where `userId` = {$userId} and `planId`<={$planId}");
        $projectList = array();
        if($project){
            $type = model('Measuretype')->getMeasureTypeMap();
            $project=unserialize($project);
            foreach(array_keys($project)as $value){
                $projectList[]=$type[$value];
            }
        }
        return $projectList;
    }

    //通过reportId获取最终报告测量计划列表
    public function getFinalReportMeasurePlanList($reportId)
    {
        $reportId = intval($reportId);
        $planList = server('Db')->getAll("select beginTime,endTIme,project from measure_plan where reportId = {$reportId}");
        $planList=$planList?:[];
        foreach($planList as $k=>$v){
            $type = model('Measuretype')->getMeasureTypeMap();
            $project=unserialize($v['project']);
            foreach(array_keys($project)as $value){
                $planList[$k]['project']=$type[$value];
            }
        }
        return $planList;
    }

}