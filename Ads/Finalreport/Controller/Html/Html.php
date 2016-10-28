<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-02
 * Time: 10:17
 */

namespace Ads\Finalreport\Controller\Html;

class Html extends BaseController
{
    use \App\Traits\AjaxReturnHtml;
    use \Ads\Api\Traits\Arr;

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {

    }

    public function doList()
    {
        $data=fc("getFinalReportPatientList");
        return  server('Smarty')->ads('finalreport/html/list')->fetch('',[
            'data'=>$data
        ]);
    }

    public function doPersonallist()
    {
        $userId = req('Get')['userId'];
        $data=fc("getFinalReportPersonalList",$userId);
        return  server('Smarty')->ads('finalreport/html/personallist')->fetch('',[
            'data'=>$data
        ]);
    }

    public function doDetail()
    {
        $reportId = req('Get')['reportId'];
        $data = fc("getFinalReportDetail",$reportId);
        $data['beginTime'] = date('Y-m-d',strtotime($data['beginTime']));
        $data['endTime'] = date('Y-m-d',strtotime($data['endTime']));
        $data['time'] = date('Y-m-d',strtotime($data['time']));
        return  server('Smarty')->ads('finalreport/html/detail')->fetch('',[
            'data'=>$data
        ]);
    }

    //获取最终报告详情
    public function doGetfinalreportdetail($reportId)
    {
        $report = fc("getFinalReportByReportId",$reportId);
        $final = array();
        if($report){
            //获取单次测量报告
            if($report['singleId']){
                $final['single']=fc("getSingleReportDetail",$report['singleId']);
            }
            //获取动态测量报告
            if($report['dynamicId']){
                $final['dynamic']= fc("getDynamicByDetail",$report['dynamicId']);
            }
            //获取健康总结报告
            if($report['healthId']){
                $final['health']= fc("getHealthReportDetail",$report['healthId']);
            }
            //获取测量计划
            if($report['reportId']){
                $final['measurePlan'] = fc("getFinalReportMeasurePlanList",$report['reportId']);
            }
            if(!empty($final))$final = array_merge($final,$report);
        }
        return $final;
    }

    //获取个人报告列表
    public function doGetfinalreportlist($userId)
    {
        $userId = intval($userId);
        $finalReport = server('Db')->getAll("select reportId,time,project,healthId from final_report where `userId`={$userId}");
        $finalReport = $finalReport?:[];
        $finalReportMap = server('Db')->getMap("select reportId,Finalreport from health_report where `userId`={$userId}");
        if($finalReport){
            foreach($finalReport as $k=>$v){
                $finalReport[$k]['reportId']=intval($finalReport[$k]['reportId']);
                $finalReport[$k]['project'] = implode(",",unserialize($v['project']));
                $finalReport[$k]['Finalreport'] = $finalReportMap[$v['healthId']];
                unset($finalReport[$k]['healthId']);
            }
        }
        return $finalReport;
    }

    //获取患者最终报告列表
    public function doGetpatientlist(){
        $map = server('Db')->getMap("select userId,count(userId) as counts from final_report group by userId");
        $user = fc("getPatientBaseInfoList");
        if($user){
            foreach($user as $k=>$v){
                $user[$k]['counts']=$map[$v['userId']]?:0;
            }
        }
        return $user?:[];
    }

    public function doGetfinalreportbyreportid($reportId)
    {
        $reportId = intval($reportId);
        $report = server('Db')->getRow("select * from final_report where reportId={$reportId}");
        return $report?:[];
    }

    //获取singlereport部分信息
    public function doGetsinglereportdeatil($singleId)
    {
        $singleId = intval($singleId);
        $single = server('Db')->getRow("select singleId,planId,doctorName,shrink,diastole,bpm,report,time from single_report where singleId = {$singleId}");
        return $single?:[];
    }
    //获取dynamic详情
    public function doGetdynamicbydetail($dynamicId)
    {
        $dynamicId = intval($dynamicId);
        $data = server('Db')->getRow("select dynamicId,doctorName,time,report,data from dynamic_report where dynamicId = {$dynamicId}");
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
        return $data?:[];
    }
    //获取helthreport部分信息
    public function doGethealthreportdetail($reportId)
    {
        $reportId = intval($reportId);
        $report = server('Db')->getRow("select Finalreport,eatSuggest,sportPlan from health_report where reportId = {$reportId}");
        return $report?:[];
    }
    //通过reportId获取最终报告测量计划列表
    public function doGetfinalreportmeasureplanlist($reportId)
    {
        $reportId = intval($reportId);
        $planList = server('Db')->getAll("select beginTime,endTIme,project from measure_plan where belongReportId = {$reportId} and active=1");
        $planList=$planList?:[];
        foreach($planList as $k=>$v){
            $type = fc("getMeasureTypeMap");
            $project=unserialize($v['project']);
            $projectList=array();
            foreach(array_keys($project)as $value){
                $projectList[]=$type[$value];
            }
            $planList[$k]['project']=$projectList;
        }
        return $planList;
    }
    //获取测量计划类型
    public function doGetmeasuretypemap()
    {
        $map = server('Db')->getMap("select `chr`,`des` from `measure_type` where active =1");
        return $map?:[];
    }
}