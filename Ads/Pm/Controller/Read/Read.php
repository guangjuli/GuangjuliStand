<?php
namespace Ads\Pm\Controller\Read;

class Read  {

    use \Ads\Pm\Traits\Data;
    use \Ads\Pm\Traits\Arr;

    public function __construct(){
    }


    public function doVersion(){
        $ads = strtolower(req('Get')['chr'])."/home/version";
        $data = adsdata($ads);
        $html = print_r($data,true);
        $html = "<pre>$html</pre>";
        echo $html;
    }


    public function doMenu(){
        $ads = strtolower(req('Get')['chr'])."/home/menu";
        $data = adsdata($ads);
        $html = print_r($data,true);
        $html = "<pre>$html</pre>";
        echo $html;
    }

    public function doDepend(){

        $ads = strtolower(req('Get')['chr'])."/home/depend";
        $data = adsdata($ads);
        $html = print_r($data,true);
        $html = "<pre>$html</pre>";
        echo $html;
    }

    public function doDependtable(){

        $ads = strtolower(req('Get')['chr'])."/home/dependtable";
        $data = adsdata($ads);
        $html = print_r($data,true);
        $html = "<pre>$html</pre>";
        echo $html;
    }

    public function doInstallsql(){
        $file = APPROOT."../Ads/".ucfirst(strtolower(req('Get')['chr'])).'/Install.sql';
        if(is_file($file)){
            $html = file_get_contents($file);
        }
        $html = "<pre>$html</pre>";
        echo $html;
    }

    public function doUnInstallsql(){
        $file = APPROOT."../Ads/".ucfirst(strtolower(req('Get')['chr'])).'/Uninstall.sql';
        if(is_file($file)){
            $html = file_get_contents($file);
        }
        $html = "<pre>$html</pre>";
        echo $html;
    }

    public function doReadme(){
        $file = APPROOT."../Ads/".ucfirst(strtolower(req('Get')['chr'])).'/Readme.md';
        if(is_file($file)){
            $html = server('Parsedown')->text(file_get_contents($file));
        }
        echo $html;
    }

    public function doApi(){
        $file = APPROOT."../Ads/".ucfirst(strtolower(req('Get')['chr'])).'/Api.md';
        if(is_file($file)){
            $html = server('Parsedown')->text(file_get_contents($file));
        }
        echo $html;
    }

    public function doHelp(){
        $file = APPROOT."../Ads/".ucfirst(strtolower(req('Get')['chr'])).'/Help.md';
        if(is_file($file)){
            $html = server('Parsedown')->text(file_get_contents($file));
        }
        echo $html;
    }



}


