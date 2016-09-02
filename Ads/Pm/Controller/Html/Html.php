<?php
namespace Ads\Pm\Controller\Html;

class Html  {

    use \Ads\Pm\Traits\Data;
    use \Ads\Pm\Traits\Arr;

    public function __construct(){
    }

    public function doIndex(){
        $str = $this->get('pmsetup');
        $ar = $this->getArr($str);
        $Str2 = $this->getStr($ar);
        D($Str2);

D($Str2);
    }

    public function doList(){
    }

    public function doSetupPost()
    {
        $pmsetup = trim(req('Post')['pmsetup']);
        $this->set('pmsetup',$pmsetup);
        R('/man/?pm/html/setup');
    }

    public function doSetup(){
        return  server('Smarty')->ads('pm/html/setup')->fetch('',[
            'pmsetup' => $this->get('pmsetup')
        ]);
    }


}
