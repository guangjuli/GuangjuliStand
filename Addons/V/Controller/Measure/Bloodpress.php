<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 9:03
 */

namespace Addons\Controller;


use Addons\Traits\AjaxReturn;

class Measure
{
    use  AjaxReturn;

    //依据时间戳删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function doDeletebloodlogbytimestampPost()
    {
        $code = model('Bloodpress')->deleteBloodLogByTimestamp(req('Post')['time']);
        $this->AjaxReturn([
            'code' => $code
        ]);
    }

    //依据日期删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function doDeletebloodlogbydatePost()
    {
        $code = model('Bloodpress')->deleteBloodLogByDate(req('Post')['createDay']);
        $this->AjaxReturn([
            'code' => $code
        ]);
    }

    //上传血压测量记录
    public function doUploadbloodlogPost()
    {
        $code = model('Bloodpress')->insertBloodLog(req('Post'));
        $msg  = model('Bloodpress')->returnNews($code);
        $this->AjaxReturn([
            'code' => $code,
            'msg'  => $msg
        ]);
    }
}