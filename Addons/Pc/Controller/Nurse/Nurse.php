<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-12
 * Time: 11:49
 */

namespace Addons\Controller;


class Nurse
{

    use \Addons\Traits\AjaxReturn;

    //注册


    //添加
    public function doAddpatientPost()
    {
        $login = req('Post')['login'];
        $orgId = req('Post')['orgId'];
        if(model('User')->isExistUserByLogin($login)){
            if(model('Nurse')->addPatient($orgId,$login)){
                $this->AjaxReturn([
                   'code'=>200
                ]);
            }else{
                $this->AjaxReturn([
                    'code'=>-200
                ]);
            }
        }else{
            $this->AjaxReturn([
               'code'=>-201,
                'msg'=>'The patient does not exist'
            ]);
        }
    }
    //查看


    //列表
    public function doGetpatientlistPost()
    {
        $orgId = req('Post')['orgId'];
        $patientList = model('Nurse')->getShowHosPatientList($orgId);
        if($patientList){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$patientList
            ]);
        }else{
            $this->AjaxReturn([
               'code'=>-200,
                'msg'=>'no data'
            ]);
        }
    }
    //搜索
    public function doSearchpatientPost()
    {
        $trueName = req('Post')['trueName'];
        $orgId = req('Post')['orgId'];
        $patient = model('Nurse')->searchPatient($trueName,$orgId);
        if($patient){
            $this->AjaxReturn([
                'code'=>200,
                'msg'=>'succeed',
                'data'=>$patient
            ]);
        }else{
            $this->AjaxReturn([
                'code'=>-200,
                'msg'=>'no data'
            ]);
        }
    }


}