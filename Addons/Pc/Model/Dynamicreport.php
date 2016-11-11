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
                $check = server('Db')->autoExecute('dynamic_report', $req, 'INSERT');
                $check = $check?true:false;
            }
        }
        return $check;
    }

    //判断该测量计划是否已经生产单次报告
    public function isExistDynamicReportPlanId($planId)
    {
        $planId = intval($planId);
        $singleId = server('Db')->getOne("select dynamicId from dynamic_report where planId = {$planId}");
        return $singleId?true:false;
    }

    //通过测量计划id获取测量数据
    public function getDynamicDataByPlanId($planId)
    {
        $planId = intval($planId);
        $data = server('Db')->getRow("select dynamicId,doctorName,report,time,data from dynamic_report where `planId`={$planId}");
        $data = $data?:[];
        if($data){
            //输出数据格式转换
            $data['dynamicId'] = intval($data['dynamicId']);
            $data['time'] = strtotime($data['time']);
            if($data['data']){
                $saveData = unserialize($data['data']);
                foreach($saveData as $k=>$v){
                    //数据类型转换
                    $saveData[$k]['time']=intval($v['time']);
                    $saveData[$k]['shrink']=intval($v['shrink']);
                    $saveData[$k]['diastole']=intval($v['diastole']);
                    $saveData[$k]['bpm']=intval($v['bpm']);
                    $saveData[$k]['average']=intval($v['average']);
                    if($v['des']){
                        if(is_array($v['des'])){
                            $saveData[$k]['des']['time']=intval($v['des']['time']);
                        }
                    }else{
                        $saveData[$k]['des']=array();
                    }
                }
                $data['data'] = $saveData;
            }else{
                $data['data']=[];
            }
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

    public function getDynamicByDetail($planId)
    {
        $planId = intval($planId);
        $data = server('Db')->getRow("select dynamicId,planId,doctorName,time,report from dynamic_report where planId = {$planId}");
        $data = $data?:[];
        if($data){
            //输出数据格式转换
            $data['planId'] = intval($data['planId']);
            $data['dynamicId'] = intval($data['dynamicId']);
            $data['time'] = strtotime($data['time']);
        }
        return $data?:[];
    }

    //获取动态测量报告列表
    public function getDynamicByUserId($userId)
    {
        $userId = intval($userId);
        $dynamicReport = server('Db')->getAll("select planId,userId,time,report from dynamic_report where `userId`={$userId} order by time desc");
        return $dynamicReport?:[];
    }

    //通过保存报告的时间来搜索报告
    public function getDynamicReportByTime($time,$userId)
    {
        $time = date('Ymd',strtotime($time));
        $userId = intval($userId);
        $report = server('Db')->getAll("select planId,userId,time,report from dynamic_report where time = '{$time}' and userId={$userId}");
        return $report?:[];
    }

    //获取最终报告的动态血压报告详情
    public function getFinalDynamicReportDetail($dynamicId)
    {
        $dynamicId = intval($dynamicId);
        $data = server('Db')->getRow("select dynamicId,doctorName,report,time,data from dynamic_report where `dynamicId`={$dynamicId}");
        $data = $data?:[];
        if($data){
            //输出数据格式转换
            $data['dynamicId'] = intval($data['dynamicId']);
            $data['time'] = strtotime($data['time']);
            if($data['data']){
                $saveData = unserialize($data['data']);
                foreach($saveData as $k=>$v){
                    //数据类型转换
                    $saveData[$k]['time']=intval($v['time']);
                    $saveData[$k]['shrink']=intval($v['shrink']);
                    $saveData[$k]['diastole']=intval($v['diastole']);
                    $saveData[$k]['bpm']=intval($v['bpm']);
                    $saveData[$k]['average']=intval($v['average']);
                    unset($saveData[$k]['des']);
                }
                $data['data'] = $saveData;
            }else{
                $data['data']=[];
            }
        }
        return $data;
    }
}