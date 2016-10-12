<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-09
 * Time: 16:26
 */

namespace Addons\Model;


class Singlereport
{
    //待传入数据
    public function insertSingleReport($req)
    {
        $check = false;
        $req = saddslashes($req);
        $plan = model('Measureplan')->getPlanTimeByPlanId($req['planId']);
        if($plan){
            $single = model('Bloodpress')->getSingleByPlanTime($plan,$req['userId']);
            if($single){
                $req['planId']=$single['planId'];
                unset($single['planId']);
                $req['data']=serialize($single);
                //一份测量计划只能有一份报告
                if(!model('Measureplan')->isExistMeasurePlan($single['planId'])){
                    $check = server('Db')->autoExecute('single_report', $req, 'INSERT');
                    $check =$check?true:false;
                }
            }
        }
        return $check;
    }

    //通过测量计划id获取报告信息
    public function getSingleBloodPressDataByPlanId($planId)
    {
        $planId = intval($planId);
        $data = server('Db')->getRow("select singleId,doctorName,shrink,diastole,bpm,report,time,data from single_report where `planId`={$planId}");
        if($data){
            $data['data'] = unserialize($data['data']);
        }
        return $data;
    }

    //获取单次测量报告源数据
    public function getSingleDataBySingleId($singleId)
    {
        $singleId = intval($singleId);
        $data = server('Db')->getOne("select data from single_report where `singleId`={$singleId}");
        $returnData = array();
        if($data){
            $returnData = unserialize($data);
        }
        return $returnData;
    }
    //通过singleId获取单次测量报告信息
    public function getSingleBloodPressBySingleId($singleId)
    {
        $singleId = intval($singleId);
        $single = server('Db')->getRow("select * from single_report where singleId = {$singleId}");
        return $single?:[];
    }
    //获取singlereport部分信息
    public function getSingleReportDeatil($singleId)
    {
        $singleId = intval($singleId);
        $single = server('Db')->getRow("select doctorName,shrink,diastole,bpm,report,time from single_report where singleId = {$singleId}");
        return $single?:[];
    }

    //获取单次测量报告列表
    public function getSingleBloodPressByUserId($userId)
    {
        $userId = intval($userId);
        $singleReport = server('Db')->getAll("select planId,userId,time,shrink,diastole,bpm,report from single_report where `userId`={$userId} order by time desc");
        return $singleReport?:[];
    }

    //获取单次测量报告页面输出列表
    //该方法暂时未用到
    public function getSingleList($userId)
    {
        $list=model('Singlereport')->getSingleBloodPressByUserId($userId);
        if($list){
            $planTime =  model('Measureplan')->getOldMeasurePlanTimeMap($userId);
            foreach($list as $k=>$v){
                $list[$k]['time']=$planTime[$v['planId']];
            }
        }
        return $list;
    }
}