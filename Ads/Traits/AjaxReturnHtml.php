<?php
namespace Ads\Traits;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:39
 * ajax返回部件
 */
trait AjaxReturnHtml
{
    /**
     * @param string $_res
     */
    public function AjaxReturn($_res = '')
    {
        if (!is_array($_res)) {
            $res = ['code' => intval($_res)];
        } else {
            $res = $_res;
        }
        $code = $res['code'] ? intval($res['code']) : 200;
        $msg = $res['msg'] ?: (($code >= 0) ? 'suceed' : 'error');
        if ($res['url']) {
            $js = "if(data.code>0){window.location.href='{$res['url']}';}else{alert(data.msg);}";
        } else {
            $js = 'if(data.code>0){location.reload();}else{alert(data.msg);}';
        }
        $js = $res['js'] ?: $js;
//        $res['js'] = $res['js'] ?: ($res['url'] ? "if(data.code>0){window.location.href='{$res['url']}';}else{alert(data.msg);}" : 'if(data.code>0){location.reload();}else{alert(data.msg);}');
        $res = [
            'code' => $code,
            'msg' => $msg,
            'js' => $js,
        ];
        echo json_encode($res);
        exit;
    }

}