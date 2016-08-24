<?php
namespace Widget\Controller;


class AdminLevelthree extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {


        $menulevelthree = Model('menu')->menuMainLevelthree();

        //如果存在更高级active 则
        $f = false;
        foreach($menulevelthree as $key=>$value){
            if($value['active']==4){
                $f = true;
            }
        }

        //存在active = 4
        if($f){
            foreach($menulevelthree as $key=>$value){
                if($value['active']!=4){
                    $menulevelthree[$key]['active'] = 0;
                }
            }
        }



        $html = WidgetView('',[
            'menulevelthree' => $menulevelthree
        ]);

        return $html;

    }


}
