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
    | ִ��
    |--------------------------------------------------------------------------
    */
    public static function Run()
    {
        self::$approot = $approot =  __DIR__.'/';
        //set_error_handler(array('\App\Bootstrap', 'customError'));      //�Զ��������

        /*ϵͳ������*/
        dc(server()->Config('Config'));   //����dc������

        $req = server('req');
        $get = $req->get;

        $controller = ($get['c']?:(isset($get['C'])?$get['C']:''))?:'Home';
        $mothed     = ($get['a']?:(isset($get['A'])?$get['A']:''))?:'Index';

        req([                   //req ����ģ��
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
        //ok,·���ֶ����ú���
        self::RouterRun();


    }

    public static  function RouterRun()
    {
        $router = req('Router');

        //��������Ŀ¼
        $basepath =        self::$approot.'Controller/';

//·�����ݺϷ��Լ��
        if (!preg_match('/^[0-9a-zA-Z]+$/',$router['controller']) || !preg_match('/^[0-9a-zA-Z]+$/',$router['mothed']))
        {
            halt('router error');
        }
        if (!preg_match('/^[a-zA-Z]+$/',substr($router['controller'],0,1)) || !preg_match('/^[a-zA-Z]+$/',substr($router['mothed'],0,1)))
        {
            halt('router error2');
        }
        $params = $router['params'];                                              //����
        /*
         * �������п��ܳ�Ϊ�ļ���������,���Ҽ���
         * */
//�������� just
        $_controller    = $router['controller'];

//������ just
        $_mothed       = $router['mothed'];

//����_ִ��
        $__mothedAction     = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed']):($router['Prefix'].$router['mothed'].ucfirst(strtolower($router['type'])));
        $__mothedActionbk   = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed'].'_'.$params):($router['Prefix'].$router['mothed'].'_'.$params.ucfirst(strtolower($router['type'])));

//������_ִ��
        $__controllerAction = '\App\Controller\\'.$router['controller'];


        /*
        1 : base
        2 : controller/action
        3 : controller/contgroller
        4 : controller.php
         * */
//���ػ��� - ����������,�����
        $file = $basepath.$_controller.'/BaseController.php';
        includeIfExist($file);

        //controller/action.php
        $file = $basepath.$_controller.'/'.$_mothed.'.php';
        includeIfExist($file);
        $_file[] = $file;

        if(!method_exists($__controllerAction, $__mothedActionbk) && !method_exists($__controllerAction, $__mothedAction)) {
            //û��Ѱ�ҵ�,���� controller/controller.php
            $file = $basepath.$_controller.'/'.$_controller.'.php';
            $_file[] = $file;
            includeIfExist($file);
        }

//�����û��
//������
        if(!method_exists($__controllerAction, $__mothedActionbk) && !method_exists($__controllerAction, $__mothedAction)) {
            //û���ҵ�ִ�з���
            //ִ��404;
            echo 'Miss file : <br>',$__controllerAction,'::'.$__mothedAction;
            echo '<br>or : ',$__controllerAction,'::'.$__mothedActionbk;
            D($_file);
        }


//ʵ����
        $controller = new $__controllerAction();

        if(method_exists($__controllerAction, $__mothedActionbk)) {
            $controller->$__mothedActionbk($params);         //ִ�з���
        }else{
            $controller->$__mothedAction($params);         //ִ�з���
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


