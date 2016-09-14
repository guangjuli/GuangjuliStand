<?php
namespace Ads\Pm\Controller\Html;

class Html  {

    use \Ads\Pm\Traits\Data;
    use \Ads\Pm\Traits\Arr;

    public function __construct(){
    }

    public function doIndex(){

        $list = $this->getArr($this->get('pmsetup'));

        $dir = [];
        $file = [];
        //1 检查文件夹是否存在,
        //2 检查lock文件是否存在
        foreach($list as $key=>$value){
            $_dir  = APPROOT."../Ads/$value/";
            $_file = APPROOT."../Ads/$value/Install.lock";
            $dir[$value] = is_dir($_dir);
            $file[$value] = is_file($_file);
        }



        return  server('Smarty')->ads('pm/html/index')->fetch('',[
            'list' => $list,
            'dir'  => $dir,
            'file' => $file,
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
