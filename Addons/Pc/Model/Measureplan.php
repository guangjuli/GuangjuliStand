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
        $insert['beginTime']=date('Ymd',strtotime($req['beginTime']));
        $insert['endTime']=date('Ymd',strtotime($req['endTime']));
        //去除project的字段
        unset($req['userId']);
        unset($req['beginTime']);
        unset($req['endTime']);
        //转移project字段
        $insert['project']=serialize($req);
        $check = server('Db')->autoExecute('measure_plan', $insert, 'INSERT');
        return $check?true:false;
    }
    //插入无效MeasurePlan
    public function insertInvalidMeasurePlan($req)
    {
        $id = null;
        $req = saddslashes($req);
        //拼装带插入的数据
        $insert['userId']=intval($req['userId']);
        $insert['beginTime']=date('Ymd',strtotime($req['beginTime']));
        $insert['endTime']=date('Ymd',strtotime($req['endTime']));
        //去除project的字段
        unset($req['userId']);
        unset($req['beginTime']);
        unset($req['endTime']);
        //转移project字段
        $insert['project']=serialize($req);
        $insert['active']=0;
        $check = server('Db')->autoExecute('measure_plan', $insert, 'INSERT');
        if($check)$id = server('Db')->insert_id();
        return $id;
    }
    //获取测量计划
    //$time 消息列表中的时间
    public function getOldMeasurePlan($userId)
    {
        $userId = intval($userId);
        $time = date('Ymd',time());
        $plan = server('Db')->getAll("select planId,project,beginTime,endTime from `measure_plan` where `userId` = {$userId} and `endTime`<='{$time}' and active=1");
        $plan=$plan?:[];
        $type = model('Measuretype')->getMeasureTypeMap();
        foreach($plan as $k=>$v){
            if($v['project']){
                $project=unserialize($v['project']);
                $pro = array();
                foreach(array_keys($project)as $value){
                    $pro[]=$type[$value];
                }
                $plan[$k]['project'] = $pro;
            }
        }
        return $plan;
    }
    //获取测量计划的时间范围map
    public function getOldMeasurePlanTimeMap($userId)
    {
        $time = date('Ymd',time());
        $userId = intval($userId);
        $plan = server('Db')->getAll("select planId,beginTime,endTime from measure_plan where endTime<='{$time}' and userId={$userId} and active=1",'planId');
        return $plan?:[];
    }
    //获取测量计划时间已过没有生产报告的计划信息
    public function getOldMeasurePlanNoReport()
    {
        $time = date('Ymd',time());
        $plan = server('Db')->query("select planId,beginTime,endTime from measure_plan where endTime<='{$time}' and reportId=0 ");
        $plan?:[];
    }
    //删除测量计划
    public function deleteMeasurePlan($userId,$planId)
    {
        $userId = intval($userId);
        $planId = intval($planId);
        $check = server('Db')->query("delete from measure_plan where `userId`={$userId} and `planId`={$planId}");
        return $check?true:false;
    }
    //获取测量计划的id
    //$time  20160810
    public function getMeasurePlanByTime($time,$userId)
    {
        $userId = intval($userId);
        $time = date('Ymd',strtotime($time));
        $plan = server('Db')->getRow("select planId,beginTime,endTime from measure_plan where userId={$userId} and beginTime<='{$time}' and endTime >='{$time}' and active=1");
        return $plan?:[];
    }
    /*//获取即将实施的测量计划
    public function getAfterMeasurePlan($planId,$userId)
    {
        $planId = intval($planId);
        $userId = intval($userId);
        $plan = server('Db')->getAll("select * from `measure_plan` where `userId` = {$userId} and `planId`>={$planId} and active=1");
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
    }*/
    //获取即将实施的测量计划2
    public function getAfterMeasurePlan($userId)
    {
        $time = date('Ymd',time());
        $userId = intval($userId);
        $plan = server('Db')->getAll("select planId,project,beginTime,endTime from `measure_plan` where `userId` = {$userId} and `beginTime`>{$time} and `reportId`=0 and active=1");
        $plan=$plan?:[];
        $type = model('Measuretype')->getMeasureTypeMap();
        foreach($plan as $k=>$v){
            $plan[$k]['planId']=intval($v['planId']);
            if($v['project']){
                $project=unserialize($v['project']);
                $projectMean = array();
                foreach(array_keys($project)as $value){
                    $projectMean[]=$type[$value];
                }
                $plan[$k]['project'] = $projectMean;
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

    //更改已生成最终报告的测量计划reportId
    public function updateMeasurePlanReportId($reportId,$planId)
    {
        $reportId = intval($reportId);
        $planId = intval($planId);
        $measureId = server('Db')->query("update measure_plan set reportId = {$reportId} where planId={$planId}");
        return $measureId?true:false;
    }
    //在最终报告中加入的测量计划id,belongReportId
    public function updateMeasurePlanBelongReportId($reportId,array $planId)
    {
        $check = false;
        $reportId = intval($reportId);
        if(!empty($planId)){
            $plan = '('.implode(',',$planId).')';
            $check = server('Db')->query("update measure_plan set reportId = {$reportId} where planId in{$plan}");
            $check?true:false;
        }
        return $check;
    }


    //获取测量计划项目列表
    public function getMeasurePlanProject($planId,$userId)
    {
        $userId = intval($userId);
        $planId = intval($planId);
        $project = server('Db')->getOne("select project from `measure_plan` where `userId` = {$userId} and `planId`<={$planId} and active=1");
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
        $planList = server('Db')->getAll("select beginTime,endTIme,project from measure_plan where belongReportId = {$reportId} and active=1");
        $planList=$planList?:[];
        foreach($planList as $k=>$v){
            $type = model('Measuretype')->getMeasureTypeMap();
            $project=unserialize($v['project']);
            $projectList=array();
            foreach(array_keys($project)as $value){
                $projectList[]=$type[$value];
            }
            $planList[$k]['project']=$projectList;
        }
        return $planList;
    }

    //批量添加维护计划
    public function batchInsertMeasurePlan($measurePlan,$userId)
    {
        $req = saddslashes($measurePlan);
        //拼装带插入的数据
        $check = false;
        $insert = array();
        foreach($req as $k=>$v){
            $insert[$k]['beginTime']=$v['beginTime'];
            $insert[$k]['endTime']=$v['endTime'];
            //去除project的字段
            unset($req[$k]['beginTime']);
            unset($req[$k]['endTime']);
            //转移project字段
            $insert[$k]['project']=serialize($req[$k]);
            $insert[$k]['userId']=$userId;
        }
        if($insert){
            $check = model('Batchinsert')->batchInsert($insert,'measure_plan');
        }
        return $check;
    }

    //更新测量计划active=1;
    public function updateMeasurePlanActiveByUserId($userId)
    {
        $userId = intval($userId);
        $check = server('Db')->query("update measure_plan set active=1 where userId={$userId}");
        return $check?true:false;
    }

    //获取未测量项目列表
    public function getMeasurePlanNoMeasureProject($userId)
    {
        $time = date('Ymd',time());
        $userId = intval($userId);
        $row = server('Db')->getRow("select beginTime,endTime,noDetection from measure_plan where `beginTime`<='{$time}' and `endTime`>='{$time}' and userId={$userId}");
        $noDetection = array();
        if($row['noDetection']){
            $detection = unserialize($row['noDetection']);
            $map = model('Measuretype')->getMeasureTypeMap();
            foreach($detection as $k=>$v){
                if($v===0){
                    $noDetection['noDetection'][]=$map[$k];
                }
            }
        }
        if($row){
            $noDetection['beginTime']=$row['beginTime'];
            $noDetection['endTime']=$row['endTime'];
        }
        return $noDetection;
    }
}