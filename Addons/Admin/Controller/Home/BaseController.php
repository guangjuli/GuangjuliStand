<?php
/**
 * shi ma
 */
namespace App\Addons;

//hook

/**
 *
 */
class BaseController{

    use \App\Addons\Traits\AjaxReturn;      //
    use \App\Addons\Traits\Views;           //视图
    use \App\Addons\Traits\Model;           //模型调用
    use \App\Addons\Traits\Help;        //通用方法
    use \App\Addons\Traits\Document;        //通用方法



    public function __construct(){
        app('adminauth')->isLoginRedirect('?ad=admin.login');

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
        //1 对视图方法进行相应
//        switch($mothed){
//            case 'fetch' :
//                if(count($args) == 1){
//                    return (new Views())->fetch($args[0]);
//                }else{
//                    return (new Views())->fetch($args[0],$args[1]);
//                }
//                break;
//            case 'display':
//                if(count($args) == 1){
//                    (new Views())->display($args[0]);
//                }else{
//                    (new Views())->display($args[0],$args[1]);
//                }
//                break;
//            case 'assign' :
//                if(count($args) == 1){
//                    (new Views())->display($args[0]);
//                }else{
//                    (new Views())->display($args[0],$args[1]);
//                }
//                break;
//        }

    }

}
