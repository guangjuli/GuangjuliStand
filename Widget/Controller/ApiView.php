<?php
namespace Widget\Controller;


class ApiView extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {
        $id = intval(req('Get')['id']);
        if($id){
            $apiview = server('db')->getrow("select * from api where apiId = $id");
            $sql = "select * from api_log where 1 order by id desc limit 20";
            $apiloglist = server('db')->getall($sql);
            foreach($apiloglist as $key=>$value){
                //输出的数据
                $apiloglist[$key]['data'] = print_r(json_decode($apiloglist[$key]['data'],true),true);

                //获取到的数据
                $apiloglist[$key]['_GET'] = print_r(json_decode($apiloglist[$key]['_GET'],true),true);
                $apiloglist[$key]['_POST'] = print_r(json_decode($apiloglist[$key]['_POST'],true),true);
                $apiloglist[$key]['_FILE'] = print_r(json_decode($apiloglist[$key]['_FILE'],true),true);

            }
            return WidgetView('', [
                'apisite'   =>  'http://gts.so/',
                'apiview'   => $apiview,
                'apiloglist'=> $apiloglist
            ]);
        }else{
            return '';
        }


    }


}
