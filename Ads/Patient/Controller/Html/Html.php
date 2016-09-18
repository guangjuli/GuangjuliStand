<?php
namespace Ads\Patient\Controller\Html;

class Html extends BaseController {
    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
        parent::__construct();
    }

//adsdata('sd/sdf/dfs/')
//{widget ads='userinfo/crop/Uploadimage'}


    //TODO:添加和编辑只对userId进行了后端校验，其他科校验的在前端校验，后端未校验

    public function doIndex()
    {

    }

    public function doList(){
        $list = server('db')->getall("select * from `patient` order by sort desc,userInfoId desc");
        return  server('Smarty')->ads('patient/html/list')->fetch('',[
            'list' => $list
        ]);
    }


    /**
     * 响应删除
     */
    public function doDelete(){
        $id = intval(req('Get')['id']);
        server('db')->query("delete from patient WHERE userInfoId = $id");
        $this->AjaxReturn([
        ]);
    }


    public function doAddPost()
    {
        $res = req('Post');
        //校验userId
        $this->validate();
        //去除空值
        if(!empty($res)){
            foreach($res as $k=>$v){
                if(!empty($v)||$v=='0'){    //传输过来的0是string类型
                    $insert[$k]=$v;
                }
            }
        }
        //添加
        if(!empty($insert)){
            server('db')->autoExecute('patient',$insert,'INSERT');
        }
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?patient/html/list'
        ]);
    }
//            "userInfo_cropImage"         => 'Userinfo/Widget/Cropimage',


    public function doAdd(){
        return server('Smarty')->ads('patient/html/add')->fetch('',[
        ]);
    }

    public function doCheckuseridPost()
    {
        $userId = intval(req("Post")['userId']);
        if(application('Validate')->validateInt($userId)){
            $login = server('Db')->getOne("select `login` from user where userId = {$userId} ");
            $msg['userId'] = $this->isExistUserInfoById($userId)?"该用户已存在,<a href='/man/?userinfo/html/edit&userId={$userId}'>请前往编辑</a>":($login?"可用,login：{$login}":'没有找到该用户');
        }else{
            $msg['userId']='格式不正确';
        }
        if(!empty($msg)){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
    }


    private function validate()
    {
        $userId = intval(req("Post")['userId']);
        if(application('Validate')->validateInt($userId)){
            $login = server('Db')->getOne("select `login` from user where userId = {$userId} ");
            $msg['userId'] = $this->isExistUserInfoById($userId)?"该用户已存在,<a href='/man/?patient/html/edit&userId={$userId}'>请前往编辑</a>":($login?'ok':'没有找到该用户');
        }else{
            $msg['userId']='格式不正确';
        }
        if(!empty($msg)&&$msg['userId']!='ok'){
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>$msg
            ]);
        }
    }

    //编辑
    public function doEditPost()
    {
        $res = req('Post');
        $id = intval($res['userId']);//
        server('db')->autoExecute('patient',$res,'UPDATE',"userId = $id");
        $this->AjaxReturn([
            'code'=>200,
            'msg'=>'',
            'url'=>'/man/?patient/html/list'
        ]);
    }

    public function doEdit(){
        $id = intval(req('Get')['userId']);
        $row = server('db')->getrow("select * from patient where userId = $id");
        return  server('Smarty')->ads('patient/html/edit')->fetch('',[
           'row' => $row
        ]);
    }

    //详情
    public function doDetail()
    {
        $id = intval(req('Get')['userId']);
        $row = server('Db')->getRow("select * from patient where `userId`={$id}");
        $source  = $_SERVER['SERVER_NAME'];
        $row['gravatar'] = 'http://'.$source.ltrim($row['gravatar'],'.');
        return  server('Smarty')->ads('patient/html/detail')->fetch('',[
            'row' => $row
        ]);
    }


    //外部Api
    //判断用户信息表user_info对应的id是否存在
    public function isExistUserInfoById($id)
    {
        if(!is_int($id))return false;
        $id = server('Db')->getOne("select `userId` from patient where `userId`=$id");
        return $id?true:false;
    }


}
