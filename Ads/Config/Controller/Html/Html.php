<?php
namespace Ads\Config\Controller\Html;

class Html {
    public function doIndex(){
    }


    public function doList(){

        $group = intval(req('Get')['group']);
        $list = server('db')->getall("SELECT * FROM `system_config` where `group` = $group order by sort");

        foreach($list as $key=>$value){
//            unset($_v);
//            $_v['name'] = $value['name'];
//            $_v['title'] = $value['title'];
//            $_v['value'] = $value['value'];
//            $_v['remark'] = $value['remark'];

            //对extra进行解析 -> type 1 : text 2 textarea 3 单选 4 多选
            if($value['type'] == 1){
                
            }elseif($value['type'] == 2){
            }elseif($value['type'] == 3){
            }elseif($value['type'] == 4){
            }



        }


//D($list);

        return  server('Smarty')->ads('Config/html/list')->fetch('',[
            'list' => $list
        ]);
    }




}
