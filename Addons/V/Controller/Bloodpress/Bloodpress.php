<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 9:03
 */

namespace Addons\Controller;



class Bloodpress extends BaseController
{
    use \Addons\Traits\AjaxReturn;

    public function __construct()
    {
        parent::__construct();
    }
    //依据时间戳删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function doDeletebloodlogbytimestampPost()
    {
        $boolean = model('Bloodpress')->deleteBloodLogByTimestamp(req('Post')['time']);
        $code = $boolean?200:-200;
        $this->AjaxReturn([
            'code' => $code
        ]);
    }

    //依据日期删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function doDeletebloodlogbydatePost()
    {
        $boolean = model('Bloodpress')->deleteBloodLogByDate(req('Post')['createDay']);
        $code = $boolean?200:-200;
        $this->AjaxReturn([
            'code' => $code
        ]);
    }

    //上传血压测量记录
    public function doUploadbloodlogPost()
    {
        //未校验待存储参数
        $boolean = model('Bloodpress')->insertBloodLog(req('Post'));
        $code = $boolean?200:-200;
        $this->AjaxReturn([
            'code' => $code
        ]);
    }

    /**
     * doBloodlogbydateandtypePost
     * 通过日期和类型获取血压记录
     */
    public function doBloodlogbydateandtypePost()
    {
        //请求参数  createDay,type
        $bloodInfo = model('Bloodpress')->getBloodLogByDateAndType(req('Post'));
        if(empty($bloodInfo)){
            $this->AjaxReturn([
                'code' => -200
            ]);
        }
        $this->AjaxReturn([
            'code' =>200,
            'msg'  =>'succeed',
            'data' => $bloodInfo
        ]);
    }

    /**
     * doGetbloodlinegraphbydatePost
     *依据日期获取血压折线图
     */
    public function doGetbloodlinegraphbydatePost()
    {
        $bloodInfo = model('Bloodpress')->getBloodLineGraphByDate(req('Post')['createDay']);
        if(empty($bloodInfo)){
            $this->AjaxReturn([
                'code' => -200
            ]);
        }
        $this->AjaxReturn([
            'code' =>200,
            'msg'  =>'succeed',
            'data' => $bloodInfo
        ]);
    }

    /**
     * doGetbloodbargraphdatePost
     *依据日期获取血压柱状图
     */
    public function doGetbloodbargraphbydatePost()
    {
        $bloodInfo=model('Bloodpress')->getBloodBarGraphByDate(req('Post')['createDay']);
        if(empty($bloodInfo)){
            $this->AjaxReturn([
                'code' => -200
            ]);
        }
        $this->AjaxReturn([
            'code' =>200,
            'msg'  =>'succeed',
            'data' => $bloodInfo
        ]);
    }

    /**
     * doGetpiechartPost
     *获取饼状图
     */
    public function doGetpiechartPost()
    {
        $pieChartInfo = model('Bloodpress')->getPieChartByDay(req('Post')['createDay'],req('Post')['day']);
        if(empty($pieChartInfo)){
            $this->AjaxReturn([
                'code' => -200
            ]);
        }
        $this->AjaxReturn([
            'code' =>200,
            'msg'  =>'succeed',
            'data' => $pieChartInfo
        ]);
    }
    public function doIndex()
    {
        view();
    }
}