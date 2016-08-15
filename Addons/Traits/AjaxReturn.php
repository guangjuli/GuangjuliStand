<?php
namespace App\Addons\Traits;

/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/7/17
 * Time: 3:39
 * ajax返回部件
 */
trait AjaxReturn{
    public function AjaxReturn($_res = 200){
        if(!is_array($_res)){
            $res = [ 'code'=>intval($_res) ];
        }else{
            $res = $_res;
        }
        $res['code']    = $res['code']?:200;
        $res['msg']     = $res['msg']?:(($res['code']>0)?'suceed':'error');
        $res['js']      = $res['js']?:($res['url']?"if(data.code>0){window.location.href='{$res['url']}';}else{alert(data.msg);}":'if(data.code>0){location.reload();}else{alert(data.msg);}');
        echo json_encode($res);
        exit;
    }
}