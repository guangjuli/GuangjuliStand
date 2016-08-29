<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 9:03
 */

namespace Addons\Controller;


class Ecg  extends BaseController
{
    use \Addons\Traits\AjaxReturn;

    public function __construct()
    {
        parent::__construct();
    }

    //依据时间戳删除心电记录
    public function doDeleteecglogbytimestampPost()
    {
        $boolean = model('Ecg')->deleteEcgLogByTimestamp(req('Post')['time']);
        if($boolean){
            $this->AjaxReturn([
                'code' => 200
            ]);
        }
        $this->AjaxReturn([
            'code' => -200
        ]);
    }

    //依据日期删除心电记录
    public function doDeleteecglogbydatePost()
    {
        $boolean = model('Ecg')->deleteEcgLogByDate(req('Post')['createDay']);
        if($boolean){
            $this->AjaxReturn([
                'code' => 200
            ]);
        }
        $this->AjaxReturn([
            'code' => -200
        ]);
    }

    //TODO:待修改
    public function doUploadecglogPost()
    {
        D(bus('tokenInfo'));
        $code = model('Ecg')->insertEcgLog($_FILES['tfile']);
        $msg  = model('Upload')->returnMsg($code);
        $this->AjaxReturn([
            'code' => $code,
            'msg'  =>$msg
        ]);
    }
}