<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 9:03
 */

namespace Addons\Controller;


use App\Traits\AjaxReturn;

class Measure
{
    use AjaxReturn;

    //依据时间戳删除心电记录
    public function doDeleteecglogbytimestampPost()
    {
        $code = model('Ecg')->deleteEcgLogByTimestamp(req('Post')['time']);
        $this->AjaxReturn([
            'code' => $code
        ]);
    }

    //依据日期删除心电记录
    public function doDeleteecglogbydatePost()
    {
        $code = model('Ecg')->deleteEcgLogByDate(req('Post')['createDay']);
        $this->AjaxReturn([
            'code' => $code
        ]);
    }

    public function doUploadecglogPost()
    {
        $code = model('Ecg')->insertEcgLog($_FILES['tfile']);
        $msg  = model('Upload')->returnMsg($code);
        $this->AjaxReturn([
            'code' => $code,
            'msg'  =>$msg
        ]);
    }
}