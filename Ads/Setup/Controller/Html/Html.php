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

    public function doYy()
    {
        $list = server('db')->getall('select * from facede');
        return  server('Smarty')->ads('setup/html/yy')->fetch('',[
            'list' => $list
        ]);
    }


    public function doFacadePost()
    {
        $id = intval(req('Post')['id']);
        $res = req('Post');
        $type = req('Post')['type'];
        $chr = req('Post')['chr'];
        server('db')->autoExecute('facede',$res,'UPDATE',"id = '$id'");

        R("/man/?setup/html/facade&type=$type&chr=$chr",1,"修改完成");
    }

    public function doFacade(){

        //根据chr来判断需要获取的数据

        $chrlist = server('db')->getcol('SELECT type FROM `facede` group by type');
        $type = req('Get')['type'];
        $chr = req('Get')['chr'];

        //根据chr获取内容

       //chr list
        $type = saddslashes($type);
        $chr = saddslashes($chr);

        $llist = server('db')->getall("SELECT * FROM `facede` where type = '$type'");

        $row = server('db')->getrow("SELECT * FROM `facede` where type = '$type' and chr = '$chr'");

        //=========================================
        //模拟输出
        if(req('Get')['io'] == 'demo'){
            //计算模拟参数的输出
            if($this->isjson($row['plike'])){
                $_params = json_decode($row['plike'],true);
            }else{
                $_params = trim($row['plike']);
            }
            $__params = print_r($_params,true);
            //计算返回的结果数据
            $rc = @fc($row['facede'],$_params);
            //D($rc);
            $rc = print_r($rc,true);
       }
        //=========================================



        return  server('Smarty')->ads('setup/html/facade')->fetch('',[
            'chrlist'   => $chrlist,
            'llist'     => $llist,
            'row'       => $row,

            '_params'   => $__params,
            'rc'        => $rc,
        ]);
    }












    public function doListPost()
    {
        $ListDataadsApplication = req('Post')['ListDataadsApplication'];
        $ListDataadsConfig = req('Post')['ListDataadsConfig'];
        $ListDataAds            = req('Post')['ListDataAds'];
        $ListDataAdshtml        = req('Post')['ListDataAdshtml'];
        $ListDataAdswidget      = req('Post')['ListDataAdswidget'];

        $Application = $this->getArr($ListDataadsApplication);
        $Config     = $this->getArr($ListDataadsConfig);
        $Ads        = $this->getArr($ListDataAds);
        $Adshtml    = $this->getArr($ListDataAdshtml);
        $Adswidget  = $this->getArr($ListDataAdswidget);

        //保存
     //   D($Adswidget);

        //=========================================================
        //$Adswidget
        $map = server('db')->getcol("SELECT chr FROM `facede` where type = 'Adswidget'");
        //1 : 删除掉无用的
        $ar = array_diff($map,$Adswidget);
        foreach($ar as $key=>$value) {
            server('db')->query("delete from facede where chr = '$value' and  type = 'Adswidget'");
        }
        //2 : 添加新加的
        $ar = array_diff($Adswidget,$map);

        foreach($ar as $key=>$value) {
            $res['chr']     = $value;
            $res['type']    = 'Adswidget';
            server('db')->autoExecute('facede',$res,'INSERT',"chr = '$value'");
        }


        //=========================================================
        //$Adshtml
        $map = server('db')->getcol("SELECT chr FROM `facede` where type = 'Adshtml'");
        //1 : 删除掉无用的
        $ar = array_diff($map,$Adshtml);
        foreach($ar as $key=>$value) {
            server('db')->query("delete from facede where chr = '$value' and  type = 'Adshtml'");
        }
        //2 : 添加新加的
        $ar = array_diff($Adshtml,$map);

        foreach($ar as $key=>$value) {
            $res['chr']     = $value;
            $res['type']    = 'Adshtml';
            server('db')->autoExecute('facede',$res,'INSERT',"chr = '$value'");
        }


        //=========================================================
        //$Ads
        $map = server('db')->getcol("SELECT chr FROM `facede` where type = 'Ads'");
        //1 : 删除掉无用的
        $ar = array_diff($map,$Ads);
        foreach($ar as $key=>$value) {
            server('db')->query("delete from facede where chr = '$value' and  type = 'Ads'");
        }
        //2 : 添加新加的
        $ar = array_diff($Ads,$map);

        foreach($ar as $key=>$value) {
            $res['chr']     = $value;
            $res['type']    = 'Ads';
            server('db')->autoExecute('facede',$res,'INSERT',"chr = '$value'");
        }








        //=========================================================
        //$Application
        $map = server('db')->getcol("SELECT chr FROM `facede` where type = 'Application'");
        //1 : 删除掉无用的
        $ar = array_diff($map,$Application);
        foreach($ar as $key=>$value) {
            server('db')->query("delete from facede where chr = '$value' and  type = 'Application'");
        }
        //2 : 添加新加的
        $ar = array_diff($Application,$map);
        foreach($ar as $key=>$value) {
            $res['chr']     = $value;
            $res['type']    = 'Application';
            server('db')->autoExecute('facede',$res,'INSERT',"chr = '$value'");
        }
        //=========================================================
        //$Config
        $map = server('db')->getcol("SELECT chr FROM `facede` where type = 'Config'");
        //1 : 删除掉无用的
        $ar = array_diff($map,$Config);
        foreach($ar as $key=>$value) {
            server('db')->query("delete from facede where chr = '$value' and  type = 'Config'");
        }
        //2 : 添加新加的
        $ar = array_diff($Config,$map);
        foreach($ar as $key=>$value) {
            $res['chr']     = $value;
            $res['type']    = 'Config';
            server('db')->autoExecute('facede',$res,'INSERT',"chr = '$value'");
        }



        R('/man/?setup/html/list');
    }

    public function doList(){


        //Application
        $_arr = server('db')->getcol("SELECT chr FROM `facede` where type = 'Application'");
        $ListDataadsApplication = $this->getStr($_arr);

        //Config
        $_arr = server('db')->getcol("SELECT chr FROM `facede` where type = 'Config'");
        $ListDataadsConfig = $this->getStr($_arr);

        //Ads
        $_arr = server('db')->getcol("SELECT chr FROM `facede` where type = 'Ads'");
        $ListDataAds = $this->getStr($_arr);

        //Adshtml
        $_arr = server('db')->getcol("SELECT chr FROM `facede` where type = 'Adshtml'");
        $ListDataAdshtml = $this->getStr($_arr);

        //Adshtml
        $_arr = server('db')->getcol("SELECT chr FROM `facede` where type = 'Adswidget'");
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
