<?php
namespace Ads\Pm\Controller\Html;

class Html  {

    use \Ads\Pm\Traits\Data;
    use \Ads\Pm\Traits\Arr;
    use \Ads\Pm\Traits\PostRequest;

    public function __construct(){
    }

    /**
     * 安装菜单
     */
    public function doInmenu()
    {
        $chr = req('Get')['chr'];
        $menuads  = strtolower($chr)."/home/version";
        $menu     = adsdata($menuads);
        echo $menu;
    }

    public function doUp()
    {
        $url = 'http://gst.so/Up.php';
        $chr = req('Get')['chr'];
        $zipfile = APPROOT."../Ads/".ucfirst($chr)."/".ucfirst($chr).".zip";
        if(is_file($zipfile)){
            $zip = base64_encode(file_get_contents($zipfile));
            $strlen = strlen($zip);


            //基本信息 depend
            //基本信息 版本
            $depend     = strtolower($chr)."/home/depend";
            $version    = strtolower($chr)."/home/version";
            $depend     = adsdata($depend);
            $version    = adsdata($version);

            $data = [
                'adschr'=> ucfirst($chr),
                'zip'   => $zip,
                'strlen'=> $strlen,
                'version'=> $version,
                'depend'=> $depend
            ];
            //上传
            $res =         $this->post_request($url,$data);
//            D($res);
        }
        R('/man/?/pm/html/index');
    }






    public function doIndex(){
        $list = $this->getArr($this->get('pmsetup'));
        $dir = [];
        $file = [];
        $zip = [];
        //1 检查文件夹是否存在,
        //2 检查lock文件是否存在
        foreach($list as $key=>$value){
            $_dir  = APPROOT."../Ads/$value/";
            $_file = APPROOT."../Ads/$value/Install.lock";
            $_zip = APPROOT."../Ads/$value/".ucfirst($value).".zip";
            $dir[$value] = is_dir($_dir);
            $file[$value] = is_file($_file);
            $zip[$value] = is_file($_zip);
        }

        return  server('Smarty')->ads('pm/html/index')->fetch('',[
            'list' => $list,
            'dir'  => $dir,
            'file' => $file,
            'zip' => $zip,
        ]);
    }

    public function doSetupPost()
    {
        $pmsetup = $this->getStr($this->getArr(req('Post')['pmsetup']));
        $this->set('pmsetup',$pmsetup);
        R('/man/?pm/html/setup');
    }

    public function doSetup(){
        return  server('Smarty')->ads('pm/html/setup')->fetch('',[
            'pmsetup' => $this->get('pmsetup')
        ]);
    }


}
