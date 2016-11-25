<?php

namespace Controller;

/**
 * ?  “访客”
 * @  “已授权“
 */

class Home extends BaseController {



//
//    /* 添加新的用户组 - 》只作为演示
//     * */
//    public function doOrgedit($param = 1)
//    {
//        view('',[
//            //空渲染
//            'res'    => M('xr')->setrow([
//                'idfield'   => 'orgId',
//                'pid'   => [
//                    'type' => 'select', // 表单的类型：text、textarea、checkbox、radio、select等
//                    'options' => array_merge(['0'=>'顶级机构'],sapp('db')->getmap('SELECT orgId,name FROM `organization` where active=1 and pid = 0 and orgId <> '.intval($param))),
//                    'value' => '0'      //default
//                ],
//            ])->rowedit(sapp('db')->getrow("select * from organization where orgId = ".intval($param))),
//        ]);
//    }

    public function doIndexPost()
    {
        M('form')->set([
            'table'     =>'category',
            'idfield'   =>'categoryId',
        ])->get()->run();
        $this->AjaxReturn();
    }



        /*
         * 列表显示
         */
    public function doIndex($params = 1){
        //ruleLib不再管理范围之内,交给专门的程序去处理
        $where = 1;						//去除无效的
        if($_COOKIE['set_get_list'])	$where .= " and active != 0";

        $sql = "select * from  category where $where order by sort desc,categoryId desc";
        $res = M('xr')->set([
            'idfield'   => 'categoryId',
        ])->all(sapp('db')->getall($sql));

        $pid = sapp('db')->getMap("select categoryId,title from category where active=1 and pid=0");
        $pid['0']='-';


        //D($pid);

        view('',[
             'res' => $res,
             'pid'=>$pid,
        ]);
    }

}

