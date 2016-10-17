<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-13
 * Time: 18:05
 */

namespace Addons\Controller;


class Doctor /*extends BaseController*/
{

    use \Addons\Traits\AjaxReturn;
    /*public function __construct()
    {
        parent::__construct();
    }*/

    //获取患者消息列表
    public function doGetpatientlistPost()
    {
        $req = req('Post');
        $newsList = model('Doctor')->getPatientList($req['orgId'],$req['page'],$req['num']);
        if($newsList){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$newsList
            ]);
        }else{
            $this->AjaxReturn([
               'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }

    //获取患者信息     ok
    public function doGetpatientinfoPost()
    {
        $req = req('Post');
        $userInfo = model('Patient')->getCutUserInfo($req['userId']);
        if($userInfo){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$userInfo
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }

    //获取患者病史     ok
    public function doGetpatientcasesPost()
    {
        $req = req('Post');
        $personalCases = model('Cases')->getPersonalCases($req['userId'],$req['orgId']);
        if($personalCases){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$personalCases
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }



    //为单条数据添加描述,单次动态共有       ok
    public function doInsertSingledatadesPost()
    {
        $req = req('Post');
        $check = model('Bloodpress')->updateSingleReport($req);
        if($check){
            $this->AjaxReturn([
                'code'=>200
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }
    //获取测量计划内紧急消息未处理数据    ok
    public function doGeturgentnewsdataPost()
    {
        $req = req('Post');
        $data = model('News')->getNewsDataId($req['time'],$req['userId']);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取测量计划内所有紧急消息数据     ok
    public function doGeturgentnewsalldataPost()
    {
        $req = req('Post');
        $data = model('News')->getNewsAllData($req['time'],$req['userId']);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //为紧急消息添加备注     ok
    public function doInserturgencydatadesPost()
    {
        $req = req('Post');
        $check = model('News')->updateNewsState($req);
        if($check){
            $this->AjaxReturn([
                'code'=>200
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200
            ]);
        }
    }

    //获取单次血压平均信息    ok
    public function doGetsingleaveragePost()
    {
        $req = req('Post');
        $singleAverage = model('Bloodpress')->getSingleBloodPressAverage($req['planId'],$req['userId']);
        if($singleAverage){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$singleAverage
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取测量计划内单次血压源数据    ok
    public function doGetsingledataPost()
    {
        $req = req('Post');
        $data = model('Bloodpress')->getSingleBloodPress($req['planId'],$req['userId']);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取单次测量已生成报告的源数据    ok
    public function doGetsinglereportdataPost()
    {
        $planId = req('Post')['planId'];
        $data=model('Singlereport')->getSingleBloodPressDataByPlanId($planId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //为测量计划生成单次测量报告     ok
    public function doInsertsinglereportPost()
    {
        $req = req('Post');
        if(!model('Singlereport')->isExistSingleReportPlanId($req['planId'])){
            $id = model('Singlereport')->insertSingleReport($req);
            if($id){
                $this->AjaxReturn([
                    'code'=>200,
                    'msg'=>'succeed',
                    'data'=>[
                        'singleId'=>$id
                    ]
                ]);
            }else{
                $this->AjaxReturn([
                    'code'=>-200
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code'=>-201,
                'msg'=>'The report has been in existence'
            ]);
        }
    }
    /*//获取单次测量报告列表   ok
    public function doGetsinglelistPost()
    {
        $userId = req('Post')['userId'];
        $list=model('Singlereport')->getSingleBloodPressByUserId($userId);
        //$list=model('Singlereport')->getSingleBloodPressByUserId(58);
        if($list){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$list
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //搜索单次测量报告   ok
    public  function  doSearchsinglereportPost()
    {
        $req = req('Post');
        $report = model('Singlereport')->getSingleReportByTime($req['time'],$req['userId']);
        //$report = model('Singlereport')->getSingleReportByTime('2016-09-01',58);
        if($report){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$report
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }*/




    //获取测量计划内动态测量数据     ok
    public function doGetdynamicdataPost()
    {
        $req = req('Post');
        $dynamicData = model('Bloodpress')->getDynamicBloodpress($req['planId'],$req['userId']);
        if($dynamicData){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$dynamicData
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取已生成报告动态测量报告源数据      ok
    public function doGetdynamicreportdataPost()
    {
        $planId = req('Post')['planId'];
        $data = model('Dynamicreport')->getDynamicDataByPlanId($planId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //为测量计划生成动态测量报告    ok
    public function doInsertdynamicreportPost()
    {
        $req = req('Post');
        if(!model('Dynamicreport')->isExistDynamicReportPlanId($req['planId'])){
            $id = model('Dynamicreport')->insertDynamicReport($req);
            if($id){
                $this->AjaxReturn([
                    'code'=>200,
                    'msg'=>'succeed',
                    'data'=>[
                        'dynamicId'=>$id
                    ]
                ]);
            }else{
                $this->AjaxReturn([
                    'code'=>-200
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code'=>-201,
                'msg'=>'The report has been in existence'
            ]);
        }
    }
    /*//获取动态测量报告列表      ok
    public function doGetdynamiclistPost()
    {
        $userId = req('Post')['userId'];
        $list=model('Dynamicreport')->getDynamicByUserId($userId);
        //$list=model('Dynamicreport')->getDynamicByUserId(58);
        if($list){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$list
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //搜索单次测量报告   ok
    public function doSearchdynamicreportPost()
    {
        $req = req('Post');
        $report = model('Dynamicreport')->getDynamicReportByTime($req['time'],$req['userId']);
        //$report = model('Dynamicreport')->getDynamicReportByTime('2016-09-01',58);
        if($report){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$report
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }*/

    //获取数据显示页面用户信息    ok
    public function doGetdatashowpageuserinfoPost()
    {
        $userId = req('Post')['userId'];
        $userInfo = model('Patient')->getDataShowPageUserInfo($userId);
        if($userInfo){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$userInfo
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }


    //获取测量计划内测量次数      ok
    public function doGetMeasureplancountPost()
    {
        $req = req('Post');
        $counts = model('Bloodpress')->getMeasurePlanCount($req['userId']);
        $this->AjaxReturn([
           'code'=>200,
            'msg'=>'succeed',
            'data'=>$counts
        ]);
    }

    //生成最终报告      ok
    public function doInsertfinalreportPost()
    {
        $req = req('Post');
        if(!model('Finalreport')->isExistFinalReportPlanId($req['planId'])){
            $check = model('Finalreport')->insertFinalReport($req);
            if($check){
                $this->AjaxReturn([
                    'code'=>200
                ]);
            }else{
                $this->AjaxReturn([
                    'code'=>-200
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code'=>-201,
                'msg'=>'The final report of the plan has been in existence'
            ]);
        }
    }
    //获取最终报告列表     ok
    public function doGetfinalreportlistPost()
    {
        $userId = req('Post')['userId'];
        $list = model('Finalreport')->getFinalReportList($userId);
        if($list){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$list
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取报告详情     ok
    public function doGetfinalreportdetailPost()
    {
        $reportId=req('Post')['reportId'];
        $final = model('Finalreport')->getFinalReport($reportId);
        if($final){
            $this->AjaxReturn([
               'code'=>200,
                'msg'=>'succeed',
                'data'=>$final
            ]);
        }else{
            $this->AjaxReturn([
               'code'=>-200,
                'msg'=>'no data'
            ]);
        }
    }

    //获取未实施的测量计划
    public function doGetnobeginmeasureplanPost()
    {
        $userId=req('Post')['userId'];
        $data = model('Measureplan')->getAfterMeasurePlan($userId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }
    //获取已实施的测量计划
    public function doGetfinishmeasureplanPost()
    {
        $userId=req('Post')['userId'];
        $data = model('Measureplan')->getOldMeasurePlan($userId);
        if($data){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$data
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data!'
            ]);
        }
    }



    public function doTest(){
        view('',[]);
    }
}