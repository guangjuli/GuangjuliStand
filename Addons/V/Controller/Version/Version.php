<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-19
 * Time: 11:54
 */

namespace Addons\Controller;


class Version extends BaseController
{
    use \Addons\Traits\AjaxReturn;

    public function __construct()
    {
        parent::__construct();
    }

    public function doVersionPost()
    {
        $req = req('Post');
        if(model('Version')->validate($req)){
            $new = model('Version')->isUpdateVersion($req);
            if(!empty($new)){
                $this->AjaxReturn([
                    'code'=>200,
                    'msg'=>"发现新版本",
                    'data'=>$new
                ]);
            }else{
                $this->AjaxReturn([
                    'code'=>201,
                    'msg'=>"当前版本以为最新版本"
                ]);
            }
        }else{
            $this->AjaxReturn([
                'code'=>-201,
                'msg'=>"参数错误"
            ]);
        }
    }

    public function doTest()
    {
        view('',[]);
    }
}