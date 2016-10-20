<?php



    /*
     |-------------------------------------------------------
     | 封装
     |-------------------------------------------------------
    */
    if (! function_exists('fc')) {
        function fc($key = null,$params = null)
        {
            if(empty($key))return null;
            $key = (string)$key;
            //检索数据库,得到数据类型
            $key = saddslashes($key);
            $data = '';

            $row = server('db')->getrow("select * from facede where facede = '$key'");

            if($row['cache'] == 1 && !empty($row['expire'])){       //缓存
                //===========================================================
                $_params = '';
                if(!empty($params))$_params = serialize($params);
                $cachekey = md5($key.$_params);
                //===========================================================

                if(server('cache')->has($cachekey)){
                    $data = server('cache')->get($cachekey);
                    return $data;
                }
            }

            $type = $row['type'];       //Application / Config / Ads / Adshtml / Adswidget
            switch($type){
                case 'Application':
                    $data = application('Data')->get($row['chr']);
                    break;
                case 'Config':
                    $data = config($row['chr']);
                    break;
                case 'Ads':
                case 'Adshtml':
                case 'Adswidget':
                $data = adsdata($row['chr'],$params);
                    break;
            }

            if($row['cache'] == 1 && !empty($row['expire'])){   //缓存
                server('cache')->set($cachekey,$data,intval($row['expire']));
            }

            return $data;

        }
    }

/*0:数字1:字符2:文本3:数组4:枚举*/
    if (! function_exists('config')) {
        function config($name = null)
        {
            $name = saddslashes($name);
            $row = server('db')->getrow("select * from system_config where name = '$name'");
            switch($row['type']){
                case '0':
                    return intval($row['value']);
                    break;
                case '1':
                case '2':
                case '4':                    //枚举 用于配置本身
                    return $row['value'];
                    break;
                case '3':
                    //组 返回map
                    $rc = explode("\n",$row['value']);
                    $_g = [];
                    foreach($rc as $key=>$value){
                        if(!empty($value)){
                            $_ar = explode(":",trim($value,"\r"));
                            $_g[$_ar[0]] = $_ar[1];
                        }
                    }
                    return $_g;
                    break;
                default:
                    //
                    break;
            }
            return null;
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
                    $ob = new $abs($parameters);
                    return $ob;
                }
            }

            //控制器模型
            $abs = "App\\Model\\".ucfirst($make);
            if(class_exists($abs)){
                $ob = new $abs($parameters);
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
    | 系统 全局
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
                headers();
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


    /*
    |------------------------------------------------------
    | 频道 数据流
    |------------------------------------------------------
    */
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

    if (! function_exists('channel')) {
        function channel($channel,$args = 0,$key = '', $value = array())
        {
            return Grace\Wise\Wise::getInstance()->channel($channel)->C($args,$key, $value);
        }
    }


    /**
     * ===============================================
     * ads相关
     * ===============================================
     */

    /**
     * @param string $ads
     *
     * @return string
     */
    function gata($ads = '') {
        //获取数据 或页面widget
        //利用bus进行对象存储,避免多次实例化
        $data =  \App\Ads::getInstance()->ads($ads);
        return $data;
    }

    /**
     * @param string $ads
     *
     * @return string
     */
    function adsdata($ads = '',$params = array()) {
        //获取数据 或页面widget
        //利用bus进行对象存储,避免多次实例化
        $data =  \App\Ads::getInstance()->ads($ads,$params);
        return $data;
    }

    /**
     * @param string $ads
     *
     * @return string
     */
    function Widget($ads = '') {
        $data =  \App\Ads::getInstance()->ads($ads);
        return $data;
    }









    /**
     * ===============================================
     * 视图
     * ===============================================
     */
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

    if (! function_exists('fetch')) {
        function fetch($tpl = null, $data = [])
        {
            return server('Smarty')->path(APPROOT.'/Views/')->router(req('Router'))->fetch($tpl,$data);
            //            $views = server('View')->router(req('Router'));
            //            $views->display($tpl, $data);
        }
    }

    if (! function_exists('WidgetView')) {
        function WidgetView($tpl = null, $data = [])
        {
            $tpl = $tpl?ucfirst($tpl):sc('widget');
            return server('Smarty')->path('../Widget/Views/')->router()->fetch('../'.$tpl,$data);
        }
    }

    /**
     * ===============================================
     * smarty插件
     * ===============================================
     */

    /**
     * 页面widget 在tpl文件中进行调用
     * @param $params
     * @return mixed
     */
    function smarty_function_widget($params = []) {
        return \App\Ads::getInstance()->ads($params['ads']);
    }


//function smarty_function_widget($_params = '',$params = []) {
//    //根据参数输出页面widget
//    return \Widget\Bootstrap::Run($_params['name']);
////        return (new App\Model\Widget)->$params['name']();
//}

