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
        //校验参数
        $filed = ['measuretype','createday','time','shrink','diastole','bpm','measuretype'];
        if(!model('Validate')->validateParams($filed,$req)) return -201;
        if(!model('Validate')->validateParamsType($req,[],$filed)) return -202;
        //插入bloodpress表
        $req['userId'] = bus('tokenInfo')['userId'];
        $insert = server('Db')->autoExecute('bloodpress', $req, 'INSERT');
        return $insert?200:-203;
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