<?php
namespace Addons\Model;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:39
 * ajax返回部件
 */
class AjaxReturn{
    public static function AjaxReturn($res = []){
        if(!is_array($res)) {
            $res['code'] = intval($res);
        }
        $res['code']    = $res['code']?:bus('modelerror')['code']?:200;        //默认 200
        $res['msg']     = $res['msg']?:bus('modelerror')['msg']?:(($res['code']>0)?'suceed':'error');
        $res['data']    = $res['data']?:[];
        $res['ds']      = $res['data']?1:0;
        Model('ApiLog')->sniffer($res);
        echo json_encode($res);
        exit;
    }
}