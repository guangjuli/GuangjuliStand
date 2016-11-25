<?php

namespace Model;
//use Grace\Model;

    /*
    * 根据mcae
    * 检索结合数据库debug标签
    * 返回调试数据或者404数据
    */

class RapiModel //extends Model
{

    public function __construct()
    {
    }


    //添加数据进入日志
    public function log()
    {
        $res = [
        'module'    => strtolower(req('Router')['m']),
        'controller'=> strtolower(req('Router')['c']),
        'action'    => req('Router')['a'],
        'mothed'    => req('Router')['type'],
        '_GET'      => json_encode(req('Get')),
        '_POST'     => json_encode(req('Post')),
        '_FILE'     => json_encode($_FILES),
        'router'    => json_encode(req('Router'))
        ];
        sapp('db')->autoexecute('api_log',$res,'INSERT');
    }

    /*
     * M('rapi')->sniffer();                //debug 会拦截
     * 404终止
     * M('rapi')->sniffer()->E404();        //判断debug拦截,否则404
     */
    public function sniffer()
    {
        $this->log();
        $m      = strtolower(req('Router')['m']);
        $key    = strtolower(req('Router')['c']) . '/' . req('Router')['a'];
        $where = "v = '$m' and api = '$key'";
        $row = sapp('db')->getrow("SELECT * FROM `api` where $where");
        if($row){
            if($row['debug']){
                $json = json_decode($row['response'],true);
                $json['get']    = req('Get');
                $json['post']   = req('Post');
                $json['mcae']   = strtolower(req('Router')['m']) . ' / ' . strtolower(req('Router')['c']) . '/' . req('Router')['a'] . ' / ' . req('Router')['type'];
                $json['from']   = 'db debug';
                echo json_encode($json);
            }else{
                return $this;
            }
        }else{
            return $this;
        }
        exit;
    }


    //输出404错误
    public function E404()
    {
        echo json_encode([
            'code'  => 404,
            'msg'   => '404',
            'data'  => [],
            'get'   => req('Get'),
            'post'  => req('Post'),
            'mcae'  => strtolower(req('Router')['m']) . ' / ' . strtolower(req('Router')['c']) . '/' . req('Router')['a'] . ' / ' . req('Router')['type'],
            'from'  => 'E404'
        ]);
        exit;
    }



}


