<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 10:00
 */

namespace Addons\Model;


class Bloodpress
{
    //按时间戳删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function deleteBloodLogByTimestamp($time)
    {
        $time = intval($time);
        $userId = bus('tokenInfo')['userId'];
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `time`= $time");
        return $check?200:-200;
    }

    /*String date
    eg: 20160823*/
    //按日期删除血压记录
    //必须经过model('Gate')->verifyToken()
    public function deleteBloodLogByDate($createDay)
    {
        $createDay = intval($createDay);
        $userId = bus('tokenInfo')['userId'];
        $check = server('Db')->query("delete from bloodpress where `userId`= $userId and `createDay`= $createDay");
        return $check?200:-200;
    }

    //插入血压记录
    //必须经过model('Gate')->verifyToken()
    public function insertBloodLog(Array $req)
    {
        //插入bloodpress表
        $userId = bus('tokenInfo')['userId'];
        $insert = array();
        foreach($req['story'] as $v){
            $v['userId'] = $userId;
            $insert[] = '('.implode(',',$v).')';
        }
        $insert = implode(',',$insert);
        $check = server('Db')->query("insert into bloodpress(type,createDay,time,shrink,diastole,bpm,userId)values $insert");
        return $check?200:-200;
    }

    /**
     * 通过日期和类型获取血压记录
     */
    public function getBloodLogByDateAndType($req)
    {
        $userId = bus('tokenInfo')['userId'];
        $type = intval($req['type']);
        $createDay = intval($req['createDay']);
        $bloodInfo = server('Db')->getAll("select time,shrink,diastole,bpm,createDay from bloodpress where `userId`=$userId and `type`=$type and `createDay`=$createDay");
        return $bloodInfo?$bloodInfo:-200;
    }

    /**
     * 通过日期获取血压折线图或柱状图
     */
    public function getBloodLineGraphByDate($createDay)
    {
        $userId = bus('tokenInfo')['userId'];
        $createDay = intval($createDay);
        $bloodInfo = server('Db')->getAll("select shrink,diastole,createDay from bloodpress where `userId`=$userId and `createDay`=$createDay");
        if($bloodInfo){
            $data = array();
            foreach($bloodInfo as $v){
                $data['shrink'][] = $v['shrink'];
                $data['diastole'][] = $v['diastole'];
                $data['createDay'][] = $v['createDay'];
            }
            return $data;
        }
        return -200;
    }


    public function getBloodBarGraphByDate($createDay)
    {
        if(!is_int($this->getBloodLineGraphByDate($createDay))){}
    }

    public function returnNews($code=null)
    {
        $config = [
          200=>'Succeed',
          -200=>'error',
          -201=>'缺失重要参数',
          -202=>'存在格式不正确参数',
          -203=>'System Exception'
        ];
        return $code?$config[$code]:$config;
    }
}