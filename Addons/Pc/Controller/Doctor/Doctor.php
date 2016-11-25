<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-13
 * Time: 18:05
 */

namespace Addons\Controller;


class Doctor extends BaseController
{

    use \Addons\Traits\AjaxReturn;
    public function __construct()
    {
        parent::__construct();
    }

    //获取患者消息列表
    public function doGetpatientlistPost()
    {
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        $doctorId = bus('tokenInfo')['userId'];
        $newsList = model('Doctor')->getPatientList($req['orgId'],$doctorId,$req['page'],$req['num'],$req['field'],$req['sort'],$req['trueName']);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        $data = model('News')->getNewsDataId($req['time'],$req['userId'],$req['orgId']);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        $data = model('News')->getNewsAllData($req['time'],$req['userId'],$req['orgId']);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
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
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
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
    //一般页面详情获取单次测量报告及源数据   ok
    public function doGetsinglereportdataPost()
    {
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        $planId = $req['planId'];
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
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        if(!model('Singlereport')->isExistSingleReportPlanId($req['planId'])){
            $check = model('Singlereport')->insertSingleReport($req);
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
                'msg'=>'The report has been in existence'
            ]);
        }
    }
    //一般页面获取单次测量报告内容
    public function doGetsinglereportPost()
    {
        $get_data = file_get_contents("php://input");
        $req = json_decode($get_data, true);
        $data = model('Singlereport')->getSingleReportDeatil($req['planId']);
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
    //健康报告页面获取单次测量报告
    public function doGethealthsinglereportdataPost()
    {
        $get_data = file_get_contents("php://input");
        $req = json_decode($get_data, true);
        $data = model('Singlereport')->getFinalSingleReportDetail($req['singleId']);
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
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
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
    //一般页面详情获取动态测量报告及源数据    ok
    public function doGetdynamicreportdataPost()
    {
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        $planId = $req['planId'];
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
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        if(!model('Dynamicreport')->isExistDynamicReportPlanId($req['planId'])){
            $check = model('Dynamicreport')->insertDynamicReport($req);
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
                'msg'=>'The report has been in existence'
            ]);
        }
    }
    //一般页面获取动态测量报告内容
    public function doGetDynamicreportPost()
    {
        $get_data = file_get_contents("php://input");
        $req = json_decode($get_data, true);
        $data = model('Dynamicreport')->getDynamicByDetail($req['planId']);
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
    //健康报告页面获取动态测量报告
    public function doGethealthdynamicreportdataPost()
    {
        $get_data = file_get_contents("php://input");
        $req = json_decode($get_data, true);
        $data = model('Dynamicreport')->getFinalDynamicReportDetail($req['dynamicId']);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        $userId = $req['userId'];
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        $counts = model('Bloodpress')->getMeasurePlanCount($req['userId'],$req['orgId']);
        $this->AjaxReturn([
           'code'=>200,
            'msg'=>'succeed',
            'data'=>$counts
        ]);
    }

    //生成最终报告      ok
    public function doInsertfinalreportPost()
    {
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        if(!model('Finalreport')->isExistFinalReportPlanId($req['planId'])){
            $check = model('Finalreport')->insertFinalReport($req);
            if(!empty($check)){
                $this->AjaxReturn([
                    'code'=>200,
                    'msg'=>'succeed',
                    'data'=>[
                        'reportId'=>$check
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
                'msg'=>'The final report of the plan has been in existence'
            ]);
        }
    }
    //获取最终报告列表     ok
    public function doGetfinalreportlistPost()
    {
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        $userId = $req['userId'];
        $list = model('Finalreport')->getFinalReportList($userId,$req['page'],$req['num'],$req['time']);
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
    //搜索最终报告  弃用
    /*public function doSearchfinalreportPost()
    {
        $get_data = file_get_contents("php://input");
        $req = json_decode($get_data, true);
        $userId = $req['userId'];
        $time = $req['time'];
        $list = model('Finalreport')->searchFinalReport($userId,$time);
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
    }*/
    //获取报告详情     ok
    public function doGetfinalreportdetailPost()
    {
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        $reportId=$req['reportId'];
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        $userId=$req['userId'];
        $orgId = $req['orgId'];
        $data = model('Measureplan')->getAfterMeasurePlan($userId,$orgId);
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
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        $userId=$req['userId'];
        $orgId = $req['orgId'];
        $data = model('Measureplan')->getOldMeasurePlan($userId,$orgId);
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
    //添加测量计划
    public function doInsertmeasureplanPost()
    {
        $get_data = file_get_contents("php://input");
		$req = json_decode($get_data, true);
        $validate = model('Measureplan')->checkMeasurePlanTimeRange($req['beginTime'],$req['userId'],$req['orgId']);
        if($validate){
            $check = model('Measureplan')->insertMeasurePlan($req);
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
                'msg'=>'Time range can\'t cross'
            ]);
        }
    }
    //删除测量计划
    public function doDeletemeasureplanPost()
    {
        $get_data = file_get_contents("php://input"); 
		$req = json_decode($get_data, true);
        $userId = $req['userId'];
        $planId = $req['planId'];
        $check = model('Measureplan')->deleteMeasurePlan($userId,$planId);
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

    //消息列表点击消息详情前调用此接口，判断该条信息是否允许编辑
    public function doIsallowededitPost()
    {
        $get_data = file_get_contents("php://input");
        $req = json_decode($get_data, true);
        $doctorId = bus('tokenInfo')['userId'];
        $newsId = $req['newsId'];
        //设定缓存时间
        $expires = 7200;
        if(model('News')->isLock($newsId,$doctorId,$expires)){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed'
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'This message is in edit status'
            ]);
        }
    }

    //消息列表查询
    public function doSort()
    {

    }


    public function doTest(){
        view('',[]);
    }
}