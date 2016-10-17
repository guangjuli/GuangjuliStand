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
        $id = null;
        $req = saddslashes($req);
        $plan = model('Measureplan')->getPlanTimeByPlanId($req['planId']);
        if($plan){
            $single = model('Bloodpress')->getSingleByPlanTime($plan,$req['userId']);
            if($single){
                $req['planId']=$single['planId'];
                unset($single['planId']);
                $req['data']=serialize($single);
                $check = server('Db')->autoExecute('single_report', $req, 'INSERT');
                if($check)$id = server('Db')->insert_id();
            }
        }
        return $id;
    }

    //判断该测量计划是否已经生产单次报告
    public function isExistSingleReportPlanId($planId)
    {
        $planId = intval($planId);
        $singleId = server('Db')->getOne("select singleId from single_report where planId = {$planId}");
        return $singleId?true:false;
    }

    //通过测量计划id获取报告信息
    public function getSingleBloodPressDataByPlanId($planId)
    {
        $planId = intval($planId);
        $data = server('Db')->getRow("select singleId,doctorName,shrink,diastole,bpm,report,time,data from single_report where `planId`={$planId}");
        if($data){
            //输出数据格式转换
            $data['singleId'] = intval($data['singleId']);
            $data['shrink'] = intval($data['shrink']);
            $data['diastole'] = intval($data['diastole']);
            $data['bpm'] = intval($data['bpm']);
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
        $single = server('Db')->getRow("select singleId,planId,doctorName,shrink,diastole,bpm,report,time from single_report where singleId = {$singleId}");
        if($single){
            $single['singleId'] = intval($single['singleId']);
            $single['planId'] = intval($single['planId']);
            $single['shrink'] = intval($single['shrink']);
            $single['diastole'] = intval($single['diastole']);
            $single['bpm'] = intval($single['bpm']);
        }
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