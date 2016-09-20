<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-19
 * Time: 17:09
 */

namespace Addons\Controller;


class User extends BaseController
{
    use \Addons\Traits\AjaxReturn;
    public function __construct()
    {
        parent::__construct();
    }

    public function doQuestionserveyPost()
    {
        $res = req('Post');
        $res['disease']=implode(',',$res['disease']);
        $check = model('User')->insertUser($res);
        if($check){
            $this->AjaxReturn([
                'code' => 200,
                'msg' => 'succeed'
            ]);
        }else{
            $this->AjaxReturn([
                'code' => -200,
                'msg' => 'error'
            ]);
        }
    }
}