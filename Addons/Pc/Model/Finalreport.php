<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-09
 * Time: 17:57
 */

namespace Addons\Model;


class Finalreport
{
    //通过reportId获取诊断报告
    public function getFinalReportByReportId($reportId)
    {
        $reportId = intval($reportId);
        $report = server('Db')->getRow("select * from final_report where reportId={$reportId}");
        return $report?:[];
    }

    //添加最终报告
    public function insertFinalReport($req)
    {
        //插入健康报告
        $validate = false;
        $healthId = model('Healthreport')->insertHealthReport($req);
        if($healthId){
            $req['healthId']=$healthId;
            //插入项目列表project
            $project = model('Measureplan')->getMeasurePlanProject($req['planId'],$req['userId']);
            $req['project']=serialize($project);
            //赋值用户个人信息
            $user = model('Patient')->getFinalReportUserInfo($req['userId']);
            if($user)$req = array_merge($req,$user);
            $check = server('Db')->autoExecute('final_report', $req, 'INSERT');
            if($check){
                $reportId = server('Db')->insert_id();
                $check2=model('Measureplan')->updateMeasurePlanReportId($reportId,$req['userId']);
                if($check2){
                    $validate = true;
                }
            }
        }
        return $validate;
    }

    public function getFinalReport($reportId)
    {
        $report = $this->getFinalReportByReportId($reportId);
        $final = array();
        if($report){
            //获取单次测量报告
            if($report['singleId']){
                $final['single']=model('Singlereport')->getSingleReportDeatil($report['singleId']);
                unset($report['singleId']);
            }
            //获取动态测量报告
            if($report['dynamicId']){
                $final['dynamic']=model('Dynamicreport')->getDynamicByDetail($report['dynamicId']);
                unset($report['dynamicId']);
            }
            //获取健康总结报告
            if($report['healthId']){
                $final['health']=model('Healthreport')->getHealthReportDetail($report['healthId']);
                unset($report['healthId']);
            }
            //获取测量计划
            if($report['mplanId']){
                $final['measurePlan'] = model('Measureplan')->getFinalReportMeasurePlanList($report['mplanId']);
                unset($report['mplanId']);
            }
            if(!empty($final))$final = array_merge($final,$report);
        }
        return $final;
    }

    //获取最终报告列表
    public function getFinalReportList($userId)
    {
        $userId = intval($userId);
        $finalReport = server('Db')->getAll("select * from final_report where `userId`={$userId}");
        $finalReport = $finalReport?:[];
        $finalReportMap = model('Healthreport')->getHealthReportByUserId($userId);
        if($finalReport){
            foreach($finalReport as $k=>$v){
                $finalReport[$k]['project'] = unserialize($v['project']);
                $finalReport[$k]['finalReport'] = $finalReportMap[$v['healthId']];
            }
        }
        return $finalReport;
    }

    //通过planIdString获取已诊断报告的planId
    public function getHasDiagPlanId( array $planIdList)
    {
        $planIdString = '('.implode(',',$planIdList).')';
        $idList = server('Db')->getCol("select planId from final_report where planId in {$planIdString}");
        return $idList?:[];
    }
}