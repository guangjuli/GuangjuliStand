<?php
namespace App;

class Bootstrap
{
    private $_config              = array();
    public $middlewarelist        = array();
    public static $approot        = '';

    public function __construct($config = array()){
        $this->_config = $config;
    }

    /*
    |--------------------------------------------------------------------------
    | 执行
    |--------------------------------------------------------------------------
    */
    public static function Run()
    {
        self::$approot = $approot =  __DIR__.'/';
        //set_error_handler(array('\App\Bootstrap', 'customError'));      //自定义错误处理

        /*系统级配置*/
        dc(server()->Config('Config'));   //建立dc数据流

        $req = server('req');
        $get = $req->get;

        $controller = ($get['c']?:(isset($get['C'])?$get['C']:''))?:'Home';
        $mothed     = ($get['a']?:(isset($get['A'])?$get['A']:''))?:'Index';

        req([                   //req 数据模型
            'Get'   => $req->get,
            'Post'  => $req->post,
            'Env'   => $req->env,
            'Router'=> [
                'type'      => $req->env['REQUEST_METHOD'],
                'controller'    => ucfirst(strtolower($controller)),
                'mothed'        => ucfirst(strtolower($mothed)),
                'params'        => $req->get['params'],
                'Prefix'        => 'do',
            ],
        ]);
        $_GET = req('Get');
        //ok,路由字段设置好了
        self::RouterRun();


    }

    public static  function RouterRun()
    {
        $router = req('Router');

        //控制器根目录
        $basepath =        self::$approot.'Controller/';

//路由数据合法性检查
        if (!preg_match('/^[0-9a-zA-Z]+$/',$router['controller']) || !preg_match('/^[0-9a-zA-Z]+$/',$router['mothed']))
        {
            halt('router error');
        }
        if (!preg_match('/^[a-zA-Z]+$/',substr($router['controller'],0,1)) || !preg_match('/^[a-zA-Z]+$/',substr($router['mothed'],0,1)))
        {
            halt('router error2');
        }
        $params = $router['params'];                                              //参数
        /*
         * 这两个有可能成为文件单独存在,并且加载
         * */
//控制器名 just
        $_controller    = $router['controller'];

//方法名 just
        $_mothed       = $router['mothed'];

//方法_执行
        $__mothedAction     = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed']):($router['Prefix'].$router['mothed'].ucfirst(strtolower($router['type'])));
        $__mothedActionbk   = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed'].'_'.$params):($router['Prefix'].$router['mothed'].'_'.$params.ucfirst(strtolower($router['type'])));

//控制器_执行
        $__controllerAction = '\App\Controller\\'.$router['controller'];


        /*
        1 : base
        2 : controller/action
        3 : controller/contgroller
        4 : controller.php
         * */
//加载基类 - 如果基类存在,则加载
        $file = $basepath.$_controller.'/BaseController.php';
        includeIfExist($file);

        //controller/action.php
        $file = $basepath.$_controller.'/'.$_mothed.'.php';
        includeIfExist($file);
        $_file[] = $file;

        if(!method_exists($__controllerAction, $__mothedActionbk) && !method_exists($__controllerAction, $__mothedAction)) {
            //没有寻找到,尝试 controller/controller.php
            $file = $basepath.$_controller.'/'.$_controller.'.php';
            $_file[] = $file;
            includeIfExist($file);
        }

//如果还没有
//报错啦
        if(!method_exists($__controllerAction, $__mothedActionbk) && !method_exists($__controllerAction, $__mothedAction)) {
            //没有找到执行方法
            //执行404;
            echo 'Miss file : <br>',$__controllerAction,'::'.$__mothedAction;
            echo '<br>or : ',$__controllerAction,'::'.$__mothedActionbk;
            D($_file);
        }


//实例化
        $controller = new $__controllerAction();

        if(method_exists($__controllerAction, $__mothedActionbk)) {
            $controller->$__mothedActionbk($params);         //执行方法
        }else{
            $controller->$__mothedAction($params);         //执行方法
        }
    }

    public static  function customError($errno, $errstr, $errfile, $errline)
    {
        echo "<b>Custom error:</b><br> [$errno] $errstr<br />";
        echo " Error on line $errline <br>in $errfile<br />";
        echo "Ending Script";
        die();
    }

}


