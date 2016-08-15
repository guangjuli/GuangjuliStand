<?php


    //转交控制权,给view对象
    if (! function_exists('assign')) {
        function assign($key = null, $value = [])
        {
            return app('Smarty')->router(req('Router'))->assign($key, $value);
        }
    }




    /*
    |-------------------------------------------------------
    | 确定的函数
    |-------------------------------------------------------
    */

    if (! function_exists('view')) {
        function view($tpl = null, $data = [])
        {
            server('Smarty')->path(APPROOT.'/Views/')->router(req('Router'))->display($tpl,$data);
//            $views = server('View')->router(req('Router'));
//            $views->display($tpl, $data);
        }
    }



    /**
     * 对APP application server 进行封装
     */
    if (! function_exists('app')) {
        function app($make = null, $parameters = [])
        {
            if (empty($make)) {
                return null;
            }


            //标准模型
            $ob = \Application\Model::getInstance()->make($make,$parameters);
            if(empty($ob))$ob = \Application\Application::getInstance()->make($make,$parameters);
            if(empty($ob))$ob = \Grace\Server\Server::getInstance('../Application/Config/')->make($make,$parameters);
            if(empty($ob)){
                $res = [
                    'Msg'       =>  '没有发现对象',
                    'Model'     =>  "Application\\Model\\".ucfirst($make)."::class",
                    'Application'=> "Application\\Application\\".ucfirst($make)."::class",
                    'Server'    =>  "Grace\\".ucfirst($make)."\\".ucfirst($make)."::class",
                ];
                D($res);
            }
            return $ob;
        }
    }

    /**
     *
     * 对application对象的封装
     *
     */
    if (! function_exists('model')) {
        function model($make = null, $parameters = [])
        {
            //首先检查当前model目录中是否存在模型
            if (empty($make)) {
                return \Application\Model::getInstance();
            }

            //addons模型
            if(\Application\Model::getInstance()->make('routerAdd')->isAddons()){
                $abs = "Addons\\Model\\".ucfirst($make);
                if(class_exists($abs)){
                    $ob = new $abs();
                    return $ob;
                }
            }

            //控制器模型
            $abs = "App\\Model\\".ucfirst($make);
            if(class_exists($abs)){
                $ob = new $abs();
                return $ob;
            }

            return \Application\Model::getInstance()->make($make,$parameters);
        }
    }

    /**
     *
     * 对application对象的封装
     *
     */
    if (! function_exists('application')) {
        function application($make = null, $parameters = [])
        {
            if (empty($make)) {
                return \Application\Application::getInstance();
            }
            return \Application\Application::getInstance()->make($make,$parameters);
        }
    }


    /**
     *
     * 对server对象的封装
     *
     */
    if (! function_exists('server')) {
        function server($make = null, $parameters = [])
        {
            if (empty($make)) {
                return \Grace\Server\Server::getInstance('../Application/Config/');
            }
            return \Grace\Server\Server::getInstance('../Application/Config/')->make($make,$parameters);
        }
    }


    /*
    |------------------------------------------------------
    | @param $arr
    | 取代print_r()的调试函数
    |------------------------------------------------------
    */
    if (! function_exists('D')) {
        function D($arr = [])
        {
            echo '<pre>';
            print_r($arr);
            echo '<hr>';
            debug_print_backtrace();
            echo "</pre>";
            exit;
        }
    }


    /*
    |------------------------------------------------------
    | 对数据进行魔术变换
    |------------------------------------------------------
    */
    function saddslashes($string) {
        if(is_array($string)) {
            foreach($string as $key => $val) {
                $string[$key] = saddslashes($val);
            }
        } else {
            $string = addslashes($string);
        }
        return $string;
    }

    /*
     * 如果文件存在就include进来
     * @param string $path 文件路径
     * @return void
     */
    function includeIfExist($path){
        if(file_exists($path)){
            include $path;
        }
    }

    //页面跳转
    function R($url, $time=0, $msg='') {
        $url = str_replace(array("\n", "\r"), '', $url);
        if (empty($msg))
            $msg = "系统将在{$time}秒之后自动跳转到{$url}！";
        if (!headers_sent()) {
            // redirect
            if (0 === $time) {
                header('Location: ' . $url);
            } else {
                header("refresh:{$time};url={$url}");
                echo($msg);
            }
            exit();
        } else {
            $str = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
            if ($time != 0)
                $str .= $msg;
            exit($str);
        }
    }

    //输出头信息
    function headers($st = '')
    {
        switch($st){
            case "gbk":
                header("Content-type: text/html; charset=GBK");
                break;
            default;
                header("Content-type: text/html; charset=utf-8");
            break;
        }
    }

    /*
    |------------------------------------------------------
    | 数据流 bus sc dc
    |------------------------------------------------------
    */

    //中间数据层配置
    if (! function_exists('sc')) {
        function sc($key = '', $value = array())    {
            return channel('sc',func_num_args(),$key,$value);
        }
    }

    //用户层信息流配置
    if (! function_exists('bus')) {
        function bus($key = '', $value = array())   {
            return channel('bus',func_num_args(),$key,$value);
        }
    }

    //config.php 配置
    if (! function_exists('dc')) {
        function dc($key = '', $value = array())    {
            return channel('dc',func_num_args(),$key,$value);
        }
    }

    //request 配置
    if (! function_exists('req')) {
        function req($key = '', $value = array())    {
            return channel('req',func_num_args(),$key,$value);
        }
    }

    /*
     * 调试用 终止,并且显示回溯
     * */
    function halt($str){
        //Log::fatal($str.' debug_backtrace:'.var_export(debug_backtrace(), true));
        headers();
        if(dc('debug')){
            echo "<pre>";
            debug_print_backtrace();
            echo "</pre>";
        }
        echo $str;
        exit;
    }


    /*
    |------------------------------------------------------
    | 频道 数据流
    |------------------------------------------------------
    */
    if (! function_exists('channel')) {
        function channel($channel,$args = 0,$key = '', $value = array())
        {
            return Grace\Wise\Wise::getInstance()->channel($channel)->C($args,$key, $value);
        }
    }
