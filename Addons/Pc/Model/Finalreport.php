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
        if($report){
            //删除页面不需要的字段
            unset($report['project']);
            unset($report['sort']);
            unset($report['active']);
            unset($report['des']);
            $report['reportId'] = intval($report['reportId']);
            $report['userId'] = intval($report['userId']);
            $report['height'] = intval($report['height']);
            $report['weight'] = intval($report['weight']);
            $report['bmi'] = intval($report['bmi']);
            $report['hipline'] = intval($report['hipline']);
            $report['waist'] = intval($report['waist']);
        }
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
            $project = model('Measureplan')->getMeasurePlanProject($req['planId'],$req['userId'],$req['orgId']);
            $req['project']=serialize($project);
            $plan = model('Measureplan')->getPlanTimeByPlanId($req['planId']);
            $req['beginTime']=$plan['beginTime'];
            $req['endTime']=$plan['endTime'];
            //赋值用户个人信息
            $user = model('Patient')->getFinalReportUserInfo($req['userId']);
            if($user)$req = array_merge($req,$user);
            $check = server('Db')->autoExecute('final_report', $req, 'INSERT');
            if($check){
                $reportId = server('Db')->insert_id();
                $check2=model('Measureplan')->updateMeasurePlanReportId($reportId,$req['planId']);
                //TODO:未校验
                model('Measureplan')->updateMeasurePlanBelongReportId($reportId,$req['addPlanId']);
                if($check2){
                    $validate = true;
                }
            }
        }
        if(!$validate){
            //执行删除操作，TODO:以后改为事务
            $this->deleteFinalReportByPlanId($req['planId']);
            model('Healthreport')->deleteFinalReportByPlanId($req['planId']);
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
            if($report['reportId']){
                $final['measurePlan'] = model('Measureplan')->getFinalReportMeasurePlanList($report['reportId']);
                unset($report['planId']);
            }
            if(!empty($final))$final = array_merge($final,$report);
        }
        return $final;
    }

    //获取最终报告列表
    public function getFinalReportList($userId)
    {
        $userId = intval($userId);
        $finalReport = server('Db')->getAll("select reportId,time,project,healthId from final_report where `userId`={$userId}");
        $finalReport = $finalReport?:[];
        $finalReportMap = model('Healthreport')->getHealthReportByUserId($userId);
        if($finalReport){
            foreach($finalReport as $k=>$v){
                $finalReport[$k]['reportId']=intval($finalReport[$k]['reportId']);
                $finalReport[$k]['project'] = unserialize($v['project']);
                $finalReport[$k]['Finalreport'] = $finalReportMap[$v['healthId']];
                unset($finalReport[$k]['healthId']);
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

    //判断该测量计划的最终报告是否已存在
    public function isExistFinalReportPlanId($planId)
    {
        $planId = intval($planId);
        $singleId = server('Db')->getOne("select reportId from final_report where planId = {$planId}");
        return $singleId?true:false;
    }

    //依据planId删除最终报告
    public function deleteFinalReportByPlanId($planId)
    {
        $planId = intval($planId);
        $check = server('Db')->query("delete from final_report where planId = {$planId}");
        return $check?true:false;
    }

    //判断某人是否存在过最终报告
    public function isNewUser(array $userIdList)
    {
        $userIdString='('.implode(',',$userIdList).')';
        $idList= server('Db')->getCol("select userId from final_report where userId in $userIdString");
        return $idList?:[];
    }
}