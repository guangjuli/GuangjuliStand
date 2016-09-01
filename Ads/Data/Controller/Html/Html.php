<?php
namespace Ads\Data\Controller\Html;

class Html {


    public function doList(){
        return  server('Smarty')->ads('data/html/list')->fetch('',[
        ]);
    }




}
