<?php


namespace Ads\Patient\Controller\Userinfo;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-20
 * Time: 10:28
 */
class Userinfo
{
    public function doGetpatientinfo()
    {
        $userId = req('Get')['patientId'];
        $userId = intval($userId);
        //获取患者基本信息
        $patientInfo = server('Db')->getRow("select `login`,`trueName`,`gender`,`age`,`addr`,`height`,`weight`,`workEnv`,
          `identityCard`,`diseaseList`,`nervous`,`drinkwine`,`bloodpress`,`ecg`,`watch` from `patient` p ,`user` u where u.userId=p.userId and  u.userId='{$userId}'");
        //获取患者联系人
        $contacts = server('Db')->getAll("select name,phone,relationship from contacts where userId='{$userId}'");
        $patientInfo = $patientInfo?:[];
        $contacts = $contacts?:[];
        $disease = array();
        //获取患者既往病史
        if($patientInfo['diseaseList']){
            $diseaseArray = explode(',',$patientInfo['diseaseList']);
            $diseaseList = server('Db')->getMap("select diseaseId,diseaseName from disease_list");
            foreach($diseaseArray as $v){
                $disease[] = $diseaseList[$v];
            }
        }
        return  server('Smarty')->ads('patient/widget/userinfo')->fetch('',[
            'patientInfo'=>$patientInfo,
            'contacts'=>$contacts,
            'disease'=>$disease
        ]);
    }
}