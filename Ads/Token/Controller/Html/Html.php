<?php
namespace Ads\Token\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }




    public function doList(){
        $list = server('Db')->getAll("select * from `token` order by tokenId desc limit 0,10");
        $list = $list?:[];
        $userId = array();
        foreach($list as $k=>$v){
            if($v['userId'])$userId[]=$v['userId'];
            $enableTime = intval($v['createAt'])+intval($v['expireIn']);
            $list[$k]['expireIn']=$enableTime>time()?'有效':'过期';
        }
        $user = array();
        if(!empty($userId)){
            $userIdString = '('.implode(',',$userId).')';
            $user = server('Db')->getMap("select userId,login  from user where userId in $userIdString");
        }
        return  server('Smarty')->ads('token/html/list')->fetch('',[
            'list' => $list,
            'user' =>$user
        ]);
    }
    //token查询功能 2个条件1：login,2trueName
    public function doSearchPost()
    {
        $option=['trueName','login'];
        $table=['doctor','patient'];
        $req = req('Post');
        if(in_array($req['option'],$option)&&in_array($req['table'],$table)){
           if(!empty($req['value'])){
               //执行查询操作
               $value = saddslashes(trim($req['value']));
               $sql= "select u.userId,login,trueName from user u,{$req['table']} t where u.userId=t.userId and `{$req['option']}`='{$value}'";
               $userInfo = server('Db')->getAll($sql,'userId');
               if($userInfo){
                    foreach($userInfo as $v){
                        if($v['userId']) $userIdArray[]=$v['userId'];
                    }
                    if(!empty($userIdArray)){
                        $tokenInfo = $this->batchSearchToken($userIdArray);
                        if($tokenInfo){
                            $this->AjaxReturn([
                                'code'=>200,
                                'msg'=>[
                                    'tokenInfo'=>$tokenInfo,
                                    'userInfo'=>$userInfo
                                ]
                            ]);
                        }
                    }
               }
           }
        }
        $this->AjaxReturn([
           'code'=>-200
        ]);
    }

    public function doSearch()
    {
        return  server('Smarty')->ads('token/html/search')->fetch('',[

        ]);
    }

    public function batchSearchToken($userIdArray)
    {
        $userIdString = '('.implode(',',$userIdArray).')';
        $sql = "select * from token where `userId`in {$userIdString}";
        $tokenInfo = server('Db')->getAll($sql);
        $tokenInfo = $tokenInfo?:[];
        foreach($tokenInfo as $k=>$v){
            if($v['userId'])$userId[]=$v['userId'];
            $enableTime = intval($v['createAt'])+intval($v['expireIn']);
            $tokenInfo[$k]['expireIn']=$enableTime>time()?'有效':'过期';
        }
        return $tokenInfo;
    }

}
