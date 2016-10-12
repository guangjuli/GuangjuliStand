<?php
namespace Ads\Setup\Controller\Html;

class Html {

    use \Ads\Traits\Data;
    use \Ads\Traits\Arr;
    use \Ads\Traits\PostRequest;

    public function __construct(){
    }

    public function doIndex(){
    }

    public function doFacade(){

        //根据chr来判断需要获取的数据

        $chrlist = server('db')->getcol('SELECT type FROM `facede` group by type');
        $chr = req('Get')['chr'];

        //根据chr获取内容
        


        return  server('Smarty')->ads('setup/html/facade')->fetch('',[
            'chrlist' => $chrlist
        ]);
    }












    public function doListPost()
    {
        $ListDataadsApplication = req('Post')['ListDataadsApplication'];
        $ListDataadsConfig = req('Post')['ListDataadsConfig'];
        $ListDataAds            = req('Post')['ListDataAds'];
        $ListDataAdshtml        = req('Post')['ListDataAdshtml'];
        $ListDataAdswidget      = req('Post')['ListDataAdswidget'];

        $Application = $this->getMap($ListDataadsApplication);
        $Config     = $this->getMap($ListDataadsConfig);
        $Ads        = $this->getMap($ListDataAds);
        $Adshtml    = $this->getMap($ListDataAdshtml);
        $Adswidget  = $this->getMap($ListDataAdswidget);

        //保存
     //   D($Adswidget);


        //$Application
        $map = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Application'");
        foreach($Application as $key=>$value){
            if([$key] == $value){
                unset($map[$key]);
            }else{
                if(!empty($map[$key])){      //修改
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Application';
                    server('db')->autoExecute('facede',$res,'UPDATE',"chr = '$key'");
                    unset($map[$key]);
                }else{                      //添加
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Application';
                    server('db')->autoExecute('facede',$res,'INSERT');
                    unset($map[$key]);
                }
            }
        }
        foreach($map as $key=>$value){                  //剩下的map 删除
            $key = saddslashes($key);
            server('db')->query("delete from facede where chr = '$key'");
        }

        //$Config
        $map = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Config'");
        foreach($Config as $key=>$value){
            if([$key] == $value){
                unset($map[$key]);
                unset($Config[$key]);
            }else{
                if(!empty($map[$key])){      //修改
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Config';
                    server('db')->autoExecute('facede',$res,'UPDATE',"chr = '$key'");
                    unset($map[$key]);
                }else{                      //添加
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Config';
                    server('db')->autoExecute('facede',$res,'INSERT');
                    unset($map[$key]);
                }
            }
        }
        foreach($map as $key=>$value){                  //剩下的map 删除
            $key = saddslashes($key);
            server('db')->query("delete from facede where chr = '$key'");
        }

        //$ads
        $map = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Ads'");
        foreach($Ads as $key=>$value){
            if([$key] == $value){
                unset($map[$key]);
            }else{
                if(!empty($map[$key])){      //修改
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Ads';
                    server('db')->autoExecute('facede',$res,'UPDATE',"chr = '$key'");
                    unset($map[$key]);
                }else{                      //添加
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Ads';
                    server('db')->autoExecute('facede',$res,'INSERT');
                    unset($map[$key]);
                }
            }
        }
        foreach($map as $key=>$value){                  //剩下的map 删除
            $key = saddslashes($key);
            server('db')->query("delete from facede where chr = '$key'");
        }

        //$adshtml
        $map = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Adshtml'");
        foreach($Adshtml as $key=>$value){
            if([$key] == $value){
                unset($map[$key]);
            }else{
                if(!empty($map[$key])){      //修改
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Adshtml';
                    server('db')->autoExecute('facede',$res,'UPDATE',"chr = '$key'");
                    unset($map[$key]);
                }else{                      //添加
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Adshtml';
                    server('db')->autoExecute('facede',$res,'INSERT');
                    unset($map[$key]);
                }
            }
        }
        foreach($map as $key=>$value){                  //剩下的map 删除
            $key = saddslashes($key);
            server('db')->query("delete from facede where chr = '$key'");
        }

        //$adswidget
        $map = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Adswidget'");
        foreach($Adswidget as $key=>$value){
            if([$key] == $value){
                unset($map[$key]);
            }else{
                if(!empty($map[$key])){      //修改
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Adswidget';
                    server('db')->autoExecute('facede',$res,'UPDATE',"chr = '$key'");
                    unset($map[$key]);
                }else{                      //添加
                    $res['chr']     = $key;
                    $res['des']     = $value;
                    $res['type']    = 'Adswidget';
                    server('db')->autoExecute('facede',$res,'INSERT');
                    unset($map[$key]);
                }
            }
        }
        foreach($map as $key=>$value){                  //剩下的map 删除
            $key = saddslashes($key);
            server('db')->query("delete from facede where chr = '$key'");
        }




        R('/man/?setup/html/list');
    }

    public function doList(){


        //Application
        $mapApplication = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Application'");
        $_arr = [];
        foreach($mapApplication as $key=>$value){
            $_arr[] = $key.':'.$value;
        }
        $ListDataadsApplication = $this->getStr($_arr);

        //Config
        $mapConfig = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Config'");
        $_arr = [];
        foreach($mapConfig as $key=>$value){
            $_arr[] = $key.':'.$value;
        }
        $ListDataadsConfig = $this->getStr($_arr);

        //Ads
        $mapAds = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Ads'");
        $_arr = [];
        foreach($mapAds as $key=>$value){
            $_arr[] = $key.':'.$value;
        }
        $ListDataAds = $this->getStr($_arr);

        //Adshtml
        $mapAdshtml = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Adshtml'");
        $_arr = [];
        foreach($mapAdshtml as $key=>$value){
            $_arr[] = $key.':'.$value;
        }
        $ListDataAdshtml = $this->getStr($_arr);

        //Adshtml
        $mapAdswidget = server('db')->getmap("SELECT chr,des FROM `facede` where type = 'Adswidget'");
        $_arr = [];
        foreach($mapAdswidget as $key=>$value){
            $_arr[] = $key.':'.$value;
        }
        $ListDataAdswidget = $this->getStr($_arr);



        return  server('Smarty')->ads('setup/html/list')->fetch('',[
            'ListDataadsApplication'  =>  $ListDataadsApplication,
            'ListDataadsConfig' =>  $ListDataadsConfig,
            'ListDataAds'       =>  $ListDataAds,
            'ListDataAdshtml'   =>  $ListDataAdshtml,
            'ListDataAdswidget' =>  $ListDataAdswidget,
        ]);
    }



}
