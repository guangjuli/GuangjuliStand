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

    //TODO:待修改
    //获取患者消息列表   ok
    public function doPatientlistPost()
    {
        $req = req('Post');
        $newsList = model('Doctor')->getPatientList($req['orgId'],$req['page'],$req['num']);
        //$newsList = model('Doctor')->getPatientList(1,0,3);  //测试用
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

    //获取患者信息 ok
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

    //获取患者病史 ok
    public function doGetcasesPost()
    {
        $req = req('Post');
        $personalCases = model('Cases')->getPersonalCases($req['userId'],$req['orgId']);
        //$personalCases = model('Cases')->getPersonalCases(65,2);
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



    //为单条数据添加描述,单次动态共有
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
    //获取测量计划内紧急消息未处理数据
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
    //获取测量计划内所有紧急消息数据
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
    //为紧急消息添加备注
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

    //获取单次血压平均信息  ok
    public function doGetsingleaveragePost()
    {
        $req = req('Post');
        $singleAverage = model('Bloodpress')->getSingleBloodPressAverage($req['time'],$req['userId']);
        //$singleAverage = model('Bloodpress')->getSingleBloodPressAverage('20160909','58');
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
    //获取测量计划内单次血压源数据 ok
    public function doGetsingledataPost()
    {
        $req = req('Post');
        $data = model('Bloodpress')->getSingleBloodPress($req['time'],$req['userId']);
        //$data = model('Bloodpress')->getSingleBloodPress('20160909','58');
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
    //获取单次测量已生成报告的源数据   ok
    public function doGetsinglereportdataPost()
    {
        $planId = req('Post')['planId'];
        $data=model('Singlereport')->getSingleBloodPressDataByPlanId($planId);
        //$data=model('Singlereport')->getSingleBloodPressDataByPlanId(1);
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
    //为测量计划生成单次测量报告
    public function doInsertsinglereportPost()
    {
        $req = req('Post');
        $check = model('Singlereport')->insertSingleReport($req);
        //$check = model('Singlereport')->insertSingleReport(['time'=>20160909,'doctorName'=>'小亮','userId'=>58,'report'=>'dfdfe嗯嗯嗯呃恩的']);
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




    //获取测量计划内动态测量数据  ok
    public function doGetdynamicdataPost()
    {
        $req = req('Post');
        $dynamicData = model('Bloodpress')->getDynamicBloodpress($req['time'],$req['userId']);
        //$dynamicData = model('Bloodpress')->getDynamicBloodpress('20160909','58');
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
    //获取动态测量报告源数据   ok
    public function doGetdynamicreportdataPost()
    {
        $planId = req('Post')['planId'];
        $data = model('Dynamicreport')->getDynamicDataByPlanId($planId);
        //$data = model('Dynamicreport')->getDynamicDataByPlanId(1);
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
    //为测量计划生成动态测量报告
    public function doInsertdynamicreportPost()
    {
        $req = req('Post');
        $check = model('Dynamicreport')->insertDynamicReport($req);
        //$check = model('Dynamicreport')->insertDynamicReport(['time'=>20160909,'doctorName'=>'小亮','userId'=>58,'report'=>'dfdfe嗯嗯嗯呃恩的']);
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

    //获取数据显示页面用户信息   ok
    public function doGetdatashowpageuserinfoPost()
    {
        $userId = req('Post')['userId'];
        $userInfo = model('Patient')->getDataShowPageUserInfo($userId);
        //$userInfo = model('Patient')->getDataShowPageUserInfo(58);
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


    //获取测量计划内测量次数
    public function doGetMeasureplancountPost()
    {
        $req = req('Post');
        $counts = model('Bloodpress')->getMeasurePlanCount($req['time'],$req['userId']);
        $this->AjaxReturn([
           'code'=>200,
            'msg'=>'succeed',
            'data'=>$counts
        ]);
    }

    //生成最终报告
    public function doInsertfinalreport()
    {
        $req = req('Post');
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
    }
    //获取最终报告列表     ok
    public function doGetfinalreportlist()
    {
        $userId = req('Post')['userId'];
        $list = model('Finalreport')->getFinalReportList($userId);
        //$list = model('Finalreport')->getFinalReportList(58);
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
    //获取报告详情
    public function doGetfinalreportdetail()
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
}