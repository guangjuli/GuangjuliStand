<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-09
 * Time: 11:07
 */

namespace Addons\Model;


class Healthreport
{
    public function insertHealthReport($req)
    {
        $req = saddslashes($req);
        $id = null;
        if($req['doctorId']&&$req['patientId']){
            $check = server('Db')->autoExecute('health_report', $req, 'INSERT');
            if($check){
                $id = server('Db')->insert_id();
            }
        }
        return $id;
    }

    public function updateHealthReport($req)
    {
        $req = saddslashes($req);
        $check = false;
        if($req['doctorId']&&$req['reportId'])
        {
            $where ="`reportId`={$req['reportId']}";
            $check = server('Db')->autoExecute('health_report', $req, 'UPDATE',$where);
            if($check) $check=true;
        }
        return $check;
    }

    public function getHealthReport($reportId)
    {
        $reportId = intval($reportId);
        $report = server('Db')->getRow("select * from health_report where reportId = {$reportId}");
        return $report?:[];
    }

    public function getHealthReportByUserId($userId)
    {
        $userId = intval($userId);
        $report = server('Db')->getMap("select reportId,finalReport from health_report where `patientId`={$userId}");
        return $report?:[];
    }

    //判断目前时间尚未处理报告
    public function getNotDiagPlanId($userId)
    {
        //获取已过去的测量计划id列表
        $notDiag = array();
        $planList = model('Measureplan')->getOldMeasurePlanTimeMap($userId);
        if($planList){
            $planIdList = array_keys($planList);
            $list = model('Finalreport')->getHasDiagPlanId($planIdList);
            $notDiag = array_diff($planIdList,$list);
            $notDiag = $notDiag?:[];
        }
        return $notDiag;
    }

    //获取helthreport部分信息
    public function getHealthReportDetail($reportId)
    {
        $reportId = intval($reportId);
        $report = server('Db')->getRow("select finalReport,eatSuggest,sportPlan from health_report where reportId = {$reportId}");
        return $report?:[];
    }
}