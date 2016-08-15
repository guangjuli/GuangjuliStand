<?php

namespace App\Addons;

//hook


class BaseController{

    public function __construct(){
        //登录验证
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
