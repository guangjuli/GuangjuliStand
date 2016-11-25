<?php

namespace Addons\Controller;


//hook
class BaseController{

    public function __construct()
    {
        header('Content-Type: text/html; charset=utf-8'); //网页编码
    }

    public function AjaxReturn($res = []){

        if(!is_array($res)) {
            $res['code'] = intval($res);
        }
        $res['code']    = $res['code']?:bus('modelerror')['code']?:200;        //默认 200
        $res['msg']     = $res['msg']?:bus('modelerror')['msg']?:(($res['code']>0)?'suceed':'error');
        $res['data']    = $res['data']?:[];
        $res['ds']      = $res['data']?1:0;
        $res['js']      = $res['js']?:'if(data.code>0){/*alert("操作成功");*/location.reload();}else{alert(data.msg);}';
        echo json_encode($res);
        exit;
    }


} 
