<?php
namespace App\Controller;


class Ads extends BaseController
{

    use \App\Traits\AjaxReturnHtml;

    private $server = 'http://packagist.phpleague.cn/';
    private $packagisturi = 'http://packagist.phpleague.cn/list.json';

    public function __construct(){
        parent::__construct();

        //检查文件夹
        $path = APPROOT.'../Cache/zip/';
        !is_dir($path) && mkdir($path);
        $path = APPROOT.'../Cache/upzip/';
        !is_dir($path) && mkdir($path);
    }

//    public function doSetup()
//    {
//        $res = $this->doGetlist();
//        $lb = $res[req('Get')['target']];
//
//        //四个固定的widget
//        $adssetup = $lb['ads'].'/sys/setup';
//        $adshelp = $lb['ads'].'/sys/help';
//        $adsapi = $lb['ads'].'/sys/api';
//        $adsreadme = $lb['ads'].'/sys/readme';
//        view('',[
//            'adssetup' => $lb['ads'].'/sys/setup',
//            'adshelp' => $lb['ads'].'/sys/help',
//            'adsapi' => $lb['ads'].'/sys/api',
//            'adsreadme' => $lb['ads'].'/sys/readme',
//        ]);
//    }
////foreach($res as $key=>$value){
////    $res[$key]['key']       = $key;
////    $res[$key]['local']     = APPROOT.'../Ads/zip/'.$key.'.zip';
////    $res[$key]['isdownload']  = is_file($res[$key]['local']);
////    $res[$key]['installsql'] = APPROOT.'../Ads/'.ucfirst($value['ads']).'/Install.sql';
////    $res[$key]['uninstallsql'] = APPROOT.'../Ads/'.ucfirst($value['ads']).'/Uninstall.sql';
////    $res[$key]['path']       = APPROOT.'../Ads/'.ucfirst($value['ads']).'/';
////    $res[$key]['readmefile'] = APPROOT.'../Ads/'.ucfirst($value['ads']).'/Readme.md';
////    $res[$key]['islockfile'] = is_file($res[$key]['readmefile']);
////    $res[$key]['lockfile'] = APPROOT.'../Ads/'.ucfirst($value['ads']).'/install.lock';
////    $res[$key]['islockfile'] = is_file($res[$key]['lockfile']);
////}
//
//
//
//    public function delpath($path = ''){
//        if(is_dir($path)){
//            if($handle = opendir($path)){
//                while(false !== ($item = readdir($handle))){
//                    if($item!= '.' && $item != '..'){
//                        if(is_dir("$path/$item")){
//                            $this->delpath("$path/$item");
//                        }else{
//                            unlink("$path/$item");
//                        }
//                    }
//                }
//            }
//        }
//        closedir($handle);
//        rmdir($path);
//        return true;
//    }
//
//    public function doUninstall()
//    {
//        $res = $this->doGetlist();
//        $lb = $res[req('Get')['target']];
//
//        //先解压
//        $path = $lb['path'];
//        !is_dir($path) && mkdir($path);
//
//
//        /**
//         * 依赖检查
//         */
//
//
//        // 1 执行unstall.sql
//        if(is_file($lb['uninstallsql'])){
//            $sql = file_get_contents($lb['uninstallsql']);
//            $sql = str_replace("\n",'',$sql);
//            $sql = str_replace("\r",'',$sql);
//            if(!empty($sql)){
//                \Grace\Server\Server::getInstance()->make('db')->query($sql);
//            }
//        }
//
//        //删除文件
//        $this->delpath($path);
//
//        $this->AjaxReturn([
//            'code' => 200,
//            'msg'=>"卸载完成",
//            'js' => 'if(data.code>0){alert(data.msg);location.reload();}else{alert(data.msg);}'
//        ]);
//
//    }
//
//    public function doInstall()
//    {
//        $res = $this->doGetlist();
//        $lb = $res[req('Get')['target']];
//        //路径
//        $path = $lb['path'];
//        !is_dir($path) && mkdir($path);
//
//        /**
//         * 依赖检查
//         */
//
//
//        //解压
//        if(!is_file($lb['readmefile'])){
//            $this->get_zip_originalsize($lb['local'],$path);
//        }
//
//        if(!is_file($lb['lockfile'])){
//            //安装sql
//            if(is_file($lb['installsql'])){
//                $sql = file_get_contents($lb['installsql']);
//                $sql = str_replace("\n",'',$sql);
//                $sql = str_replace("\r",'',$sql);
//                if(!empty($sql)){
//                    \Grace\Server\Server::getInstance()->make('db')->query($sql);
//                }
//            }
//            @file_put_contents($lb['lockfile'],'123');
//        }
//        $this->AjaxReturn([
//            'code' => 200,
//            'msg'=>"安装完成",
//            'js' => 'if(data.code>0){alert(data.msg);location.reload();}else{alert(data.msg);}'
//        ]);
//
//    }
//
//    public function doDownload()
//    {
//        //获取本地的文件地址
//        $res = $this->doGetlist();
//        //====================================================
//        $lb = $res[req('Get')['target']];
//        $remote = $lb['zip'];
//        $local = $lb['local'];
//
//        $data = @file_get_contents($remote);
//        @file_put_contents($local,$data);
//
//        $this->AjaxReturn([
//            'code' => 200,
//            'msg'=>"下载完成",
//            'js' => 'if(data.code>0){alert(data.msg);location.reload();}else{alert(data.msg);}'
//        ]);
//    }




    public function doIndex()
    {
        //获取本地数据
        $res = $this->doGetRemotelist();
        //==================================================
        //计算所有的package

        foreach($res as $key=>$value){
            $list[] = $value['ads'];

            $rc[$value['ads']][$value['version']] = $value;
        }
      //  array_diff($list);
     //   D($list);

        view('',[
            'rc'=>$rc
        ]);
    }

    /**
     * @param $filename
     * @param $path
     * 解压文件
     */
    private function get_zip_originalsize($filename, $path) {
        //先判断待解压的文件是否存在
//        if(!file_exists($filename)){
//            die("文件 $filename 不存在！");
//        }
        $starttime = explode(' ',microtime()); //解压开始的时间

        //将文件名和路径转成windows系统默认的gb2312编码，否则将会读取不到
        $filename = iconv("utf-8","gb2312",$filename);
        $path = iconv("utf-8","gb2312",$path);
        //打开压缩包
        $resource = zip_open($filename);
        $i = 1;
        //遍历读取压缩包里面的一个个文件
        while ($dir_resource = zip_read($resource)) {
            //如果能打开则继续
            if (zip_entry_open($resource,$dir_resource)) {
                //获取当前项目的名称,即压缩包里面当前对应的文件名
                $file_name = $path.zip_entry_name($dir_resource);
                //以最后一个“/”分割,再用字符串截取出路径部分
                $file_path = substr($file_name,0,strrpos($file_name, "/"));
                //如果路径不存在，则创建一个目录，true表示可以创建多级目录
                if(!is_dir($file_path)){
                    mkdir($file_path,0777,true);
                }
                //如果不是目录，则写入文件
                if(!is_dir($file_name)){
                    //读取这个文件
                    $file_size = zip_entry_filesize($dir_resource);
                    //最大读取6M，如果文件过大，跳过解压，继续下一个
//                    if($file_size<(1024*1024*6)){
                        $file_content = zip_entry_read($dir_resource,$file_size);
                        file_put_contents($file_name,$file_content);
//                    }else{
//                        echo "<p> ".$i++." 此文件已被跳过，原因：文件过大， -> ".iconv("gb2312","utf-8",$file_name)." </p>";
//                    }
                }
                //关闭当前
                zip_entry_close($dir_resource);
            }
        }
        //关闭压缩包
        zip_close($resource);
        $endtime = explode(' ',microtime()); //解压结束的时间
        $thistime = $endtime[0]+$endtime[1]-($starttime[0]+$starttime[1]);
        $thistime = round($thistime,3); //保留3为小数
//        echo "<p>解压完毕！，本次解压花费：$thistime 秒。</p>";
        return true;
    }


    /**
     * @return mixed
     * 获取远程列表数据
     */
    private function doGetRemotelist()
    {
        //获取本地数据
        $res = application('data')->path('ads')->get('Adsremote');
        $tm  = intval(application('data')->path('ads')->get('Adsremote.tm'));
        if((time() - $tm > 3600)  || empty($res)){
            //获取远程数据
            $list = file_get_contents($this->packagisturi);
            $res = json_decode($list,true);
            application('data')->path('ads')->set('Adsremote',$res);
            application('data')->path('ads')->set('Adsremote.tm',time());
        }
        return $res;
    }

}
