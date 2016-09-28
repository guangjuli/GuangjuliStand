<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-23
 * Time: 10:24
 */

namespace Addons\Controller;


class User
{
    use \Addons\Traits\AjaxReturn;

    //用户登录
    public function doQuestion()
    {
        $disease = server('Db')->getMap("select diseaseId,diseaseName from disease_list where active=1");
        $disease=$disease?:[];
        view('',[
            'disease'=>$disease
        ]);
    }
}