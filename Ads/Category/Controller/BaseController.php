<?php

namespace Controller;

use Grace\ControllerAbs;
use Grace\ControllerAddons;

//hook
class BaseController extends ControllerAddons{

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: text/html; charset=utf-8'); //网页编码
    }

////    //ControllerBefore
//    public function middlewareBefore(){
//        return [
//            'Menu'    => \Middleware\Menu::class,
//            'Init'    => \Middleware\Init::class,
//        ];
//    }
    public function AjaxReturn($res = []){

        if(!is_array($res)) {
            $res['code'] = intval($res);
        }
        $res['code']    = $res['code']?:bus('modelerror')['code']?:200;        //默认 200
        $res['msg']     = $res['msg']?:bus('modelerror')['msg']?:(($res['code']>0)?'suceed':'error');

        $res['data']    = $res['data']?:[];
        $res['js']      = $res['js']?:'if(data.code>0){/*alert("操作成功");*/location.reload();}else{alert(data.msg);}';
        echo json_encode($res);
    }


} 
