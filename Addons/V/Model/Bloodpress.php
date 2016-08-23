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
        return $check?200:-203;
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