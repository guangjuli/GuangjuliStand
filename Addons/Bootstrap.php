<?php
namespace Addons;


//psr0
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    if(substr($className,0,12) == 'Addons\Model'){
        if ($lastNsPos = strrpos($className, '\\')) {
            $className = substr($className, $lastNsPos + 1);
            $fileName  = APPROOT.'Model' . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        require $fileName;
    }
}
spl_autoload_register('Addons\autoload');


class Bootstrap
{
    private $_config            = array();
    public $approot             = '';
    public static $_instance   = null;

    public function __construct($config = array()){
        $this->_config = $config;
    }

    public static function getInstance($config = []){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }


    public static function Run()
    {

        $res = self::getInstance()->routerRun();

        return $res;

    }


    public function routerRun()
    {
        dc(server()->Config('Config'));

        $this->approot = $approot =  __DIR__.'/';       //like           E:\phpleague\Grace\GraceStand\Addons/

        $routerstr =         \Grace\Req\Uri::getInstance()->getar();

        $module     = $routerstr[0]?:'Welcome';
        $controller = $routerstr[1]?:'Home';
        $mothed     = $routerstr[2]?:'Index';
        $params     = $routerstr[3];

        $req = server('req');

        req([                   //req ���ģ��
            'Get'   => $req->get,
            'Post'  => $req->post,
            'Env'   => $req->env,
            'Request'   => $request,
            'Router'=> [
                'type'      => $req->env['REQUEST_METHOD'],
                'module'    => ucfirst(strtolower($module)),
                'controller'=> ucfirst(strtolower($controller)),
                'mothed'    => ucfirst(strtolower($mothed)),
                'params'    => $params,
                'Prefix'    => 'do',
            ],
        ]);
        return $this->RouterRunController();

    }

    public function RouterRunController()
    {
        $router = req('Router');

        $basepath =        $this->approot.$router['module'].'/Controller/';

        if (!preg_match('/^[0-9a-zA-Z]+$/',$router['controller']) || !preg_match('/^[0-9a-zA-Z]+$/',$router['mothed']))
        {
            halt('router error1');
        }
        if (!preg_match('/^[a-zA-Z]+$/',substr($router['controller'],0,1)) || !preg_match('/^[a-zA-Z]+$/',substr($router['mothed'],0,1)))
        {
            halt('router error2');
        }
        $params = $router['params'];                                              //����

        $_controller    = $router['controller'];

        $_mothed       = $router['mothed'];

        $__mothedAction     = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed']):($router['Prefix'].$router['mothed'].ucfirst(strtolower($router['type'])));
        $__mothedActionbk   = ($router['type'] == 'GET')?($router['Prefix'].$router['mothed'].'_'.$params):($router['Prefix'].$router['mothed'].'_'.$params.ucfirst(strtolower($router['type'])));

        $__controllerAction = '\Addons\Controller\\'.$router['controller'];

        $file = $basepath.$_controller.'/BaseController.php';
        includeIfExist($file);

        //controller/action.php
        $file = $basepath.$_controller.'/'.$_mothed.'.php';
        includeIfExist($file);
        $_file[] = $file;

        if(!method_exists($__controllerAction, $__mothedActionbk) && !method_exists($__controllerAction, $__mothedAction)) {
            $file = $basepath.$_controller.'/'.$_controller.'.php';
            $_file[] = $file;
            includeIfExist($file);
        }

        if(!method_exists($__controllerAction, $__mothedActionbk) && !method_exists($__controllerAction, $__mothedAction)) {
            echo 'Miss file : <br>',$__controllerAction,'::'.$__mothedAction;
            echo '<br>or : ',$__controllerAction,'::'.$__mothedActionbk;
            D($_file);
        }

        $controller = new $__controllerAction();

        if(method_exists($__controllerAction, $__mothedActionbk)) {
            return $controller->$__mothedActionbk($params);
        }else{
            return $controller->$__mothedAction($params);
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
