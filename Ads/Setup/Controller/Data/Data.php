<?php
namespace Ads\Setup\Controller\Data;

class Data {

    use \Ads\Traits\Data;
    use \Ads\Traits\Arr;
    use \Ads\Traits\PostRequest;

    public function __construct(){
    }


    public function doList(){
        $list = $this->get("Nodelist");
        return $list;
    }

    public function doType(){
        $list = $this->get("Swlx");
        $ar = $this->getArr($list);
        $res  = [];
        foreach($ar as $key=>$value){
            if(!empty($value)){
                $__ar = explode(':',$value);
                $k = trim($__ar[0],'/');
                if($k){
                    $res[$k] = trim($__ar[1]);
                }
            }
        }
        return $res;
    }



}
