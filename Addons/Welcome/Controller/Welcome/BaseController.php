<?php

namespace App\Addons;

//hook


class BaseController{

    public function __construct(){
    }

    public function actions()
    {

    }

    public function behaviors()
    {
        return [
            'access' => [
                'only' => [],                         //行为限定
                'rules' => [
                    [
                        'actions' => [],              //行为限定
                        'allow' => true,              //判定
                        'roles' => ['G'],
                    ],
                ],
            ],
        ];
    }


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

    /**
     * @param $mothed
     * @param $args
     * 相应 Model display fetch assign
     */
    public function __call($mothed,$args)
    {
        switch($mothed) {
            case 'Model' :
                //''模型调用
                if(empty($args) || empty($args[0])) halt("Model?$args[0]");
                return (new Model())->Run($args[0]);
                break;
        }
        //1 对视图方法进行相应
        switch($mothed){
            case 'fetch' :
                if(count($args) == 1){
                    return (new Views())->fetch($args[0]);
                }else{
                    return (new Views())->fetch($args[0],$args[1]);
                }
                break;
            case 'display':
                if(count($args) == 1){
                    (new Views())->display($args[0]);
                }else{
                    (new Views())->display($args[0],$args[1]);
                }
                break;
            case 'assign' :
                if(count($args) == 1){
                    (new Views())->display($args[0]);
                }else{
                    (new Views())->display($args[0],$args[1]);
                }
                break;
        }

    }

}
