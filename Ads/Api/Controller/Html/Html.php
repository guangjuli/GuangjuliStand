<?php
namespace Ads\Api\Controller\Html;

class Html //extends BaseController
{
    use \Ads\Api\Traits\Data;
    use \Ads\Api\Traits\Arr;
    use \Ads\Api\Traits\PostRequest;
    use \Ads\Api\Traits\AjaxReturnHtml;

    public function __construct(){
        //parent::__construct();
    }

    public function doIndex(){
    }

    public function doIndexc(){
    }


    public function doApiView()
    {
        $id = intval(req('Get')['id']);
        if($id){
            $apiview = server('db')->getrow("select * from api where id = $id");
            $___where = $apiview['v'].'/'.$apiview['api'];
            $___where = trim($___where,'/');

            $sql = "select * from api_log where 1 and api = '$___where' order by id desc limit 20";
            $apiloglist = server('db')->getall($sql);
            //return print_r($sql,true);
            foreach($apiloglist as $key=>$value){
                //输出的数据
                $apiloglist[$key]['data'] = print_r(json_decode($apiloglist[$key]['data'],true),true);

                //获取到的数据
                $apiloglist[$key]['_GET'] = print_r(json_decode($apiloglist[$key]['_GET'],true),true);
                $apiloglist[$key]['_POST'] = print_r(json_decode($apiloglist[$key]['_POST'],true),true);
                $apiloglist[$key]['_FILE'] = print_r(json_decode($apiloglist[$key]['_FILE'],true),true);

            }
            return  server('Smarty')->ads('api/html/apiview')->fetch('',[
                'apisite'   =>  '/',
                'apiview'   => $apiview,
                'apiloglist'=> $apiloglist
            ]);
        }else{
            return '';
        }
    }
    public function doDelete()
    {
        $id = intval(req('Get')['id']);
        app('db')->query("delete from api where id = $id");

        $this->AjaxReturn();
    }

    public function doEditPost()
    {
        $id = req('Post')['id'];
        $res = req('Post');

        $v = saddslashes(trim($res['v']));
        $api = saddslashes(trim($res['api']));

        //重复性检查
        $where = "v = '$v' and api = '$api' and id != $id";
        $row = app('db')->getall("select * from api where $where");
        if($row){
            R('/man/?/api/html/list',2,"api不对");
        }
        $res = saddslashes($res);
        app('db')->autoExecute("api",$res,'UPDATE',"id = $id");
        R('/man/?/api/html/list');
    }

    public function doEdit()
    {
        $id= req('Get')['id'];
        $row = app('db')->getrow("select * from api where id = $id");
        return  server('Smarty')->ads('api/html/edit')->fetch('',[
            'row'=>$row
        ]);
    }

    public function doAddPost()
    {
        $res = req('Post');

        //重复性检查
        $v = saddslashes($res['v']);
        $api = saddslashes($res['api']);
        //重复性检查

        $where = "v = '$v' and api = '$api'";
        $row = app('db')->getall("select * from api where $where");
        if($row){
            R('/man/?/api/html/list',2,"api不对");
        }
        $res = saddslashes($res);
        app('db')->autoExecute("api",$res,'INSERT');
        R('/man/?/api/html/list');
    }

    public function doAdd()
    {
        return  server('Smarty')->ads('api/html/add')->fetch('',[
        ]);
    }

    /**
     * 后台首页
     */
    public function doList()
    {
        $list = app('db')->getall("select * from api");
        //D($list);
        return  server('Smarty')->ads('api/html/list')->fetch('',[
            'list'=>$list
        ]);
    }

    public function doLog()
    {
        $list = app('db')->getall("select * from api");
        return  server('Smarty')->ads('api/html/log')->fetch('',[
            'list'=>$list
        ]);
    }


}
