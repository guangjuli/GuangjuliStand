<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-10
 * Time: 9:48
 */

namespace Addons\Model;


class Dynamicreport
{
    //待传入数据 $time消息列表时间
    public function insertDynamicReport($req)
    {
        $check = false;
        $req = saddslashes($req);
        $plan = model('Measureplan')->getPlanTimeByPlanId($req['planId']);
        if($plan){
            $dynamic = model('Bloodpress')->getDynamicByPlanTime($plan,$req['userId']);
            if($dynamic){
                $req['planId']=$dynamic['planId'];
                unset($dynamic['planId']);
                $req['data']=serialize($dynamic);
                //一份测量计划只能有一份报告
                if(!model('Measureplan')->isExistMeasurePlan($dynamic['planId'])){
                    $check = server('Db')->autoExecute('dynamic_report', $req, 'INSERT');
                    $check =$check?true:false;
                }
            }
        }
        return $check;
    }

    //通过测量计划id获取测量数据
    public function getDynamicDataByPlanId($planId)
    {
        $planId = intval($planId);
        $data = server('Db')->getRow("select dynamicId,doctorName,shrink,diastole,bpm,report,time,data from dynamic_report where `planId`={$planId}");
        if($data){
            $data['data'] = unserialize($data['data']);
        }
        return $data;
    }

    //通过dynamicId获取动态测量报告信息
    public function getDynamicByDynamicId($dynamicId)
    {
        $dynamicId = intval($dynamicId);
        $dynamic = server('Db')->getRow("select * from single_report where dynamicId = {$dynamicId}");
        return $dynamic?:[];
    }

    public function getDynamicByDetail($dynamicId)
    {
        $dynamicId = intval($dynamicId);
        $dynamic = server('Db')->getRow("select doctorName,time,report,data from single_report where dynamicId = {$dynamicId}");
        if($dynamic['data']){
            $dynamic['data']=unserialize($dynamic['data']);
        }
        return $dynamic?:[];
    }

    //获取动态测量报告列表
    public function getDynamicByUserId($userId)
    {
        $userId = intval($userId);
        $dynamicReport = server('Db')->getAll("select planId,userId,time,shrink,diastole,bpm,report from dynamic_report where `userId`={$userId} order by time desc");
        return $dynamicReport?:[];
    }

    //通过保存报告的时间来搜索报告
    public function getDynamicReportByTime($time,$userId)
    {
        $time = date('Ymd',strtotime($time));
        $userId = intval($userId);
        $report = server('Db')->getAll("select planId,userId,time,shrink,diastole,bpm,report from dynamic_report where time = '{$time}' and userId={$userId}");
        return $report?:[];
    }

}