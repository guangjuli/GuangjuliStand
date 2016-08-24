<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 9:04
 */

namespace Addons\Model;


class Ecg
{
    //按时间戳删除心电记录
    //必须经过model('Gate')->verifyToken()
    public function deleteEcgLogByTimestamp($time)
    {
        $time = intval($time);
        $userId = bus('tokenInfo')['userId'];
        $savePath = server('Db')->query("select `savePath` from ecg where `userId` = $userId and `time`=$time");
        $check = server('Db')->query("delete from ecg where `time`= $time");
        return $check?(unlink($savePath)?200:-200):-200;
    }

    /*String date
    eg: 20160823*/
    //按日期删除心电记录
    //必须经过model('Gate')->verifyToken()
    public function deleteEcgLogByDate($createDay)
    {
        $createDay = intval($createDay);
        $userId = bus('tokenInfo')['userId'];
        $savePath = server('Db')->query("select `savePath` from ecg where `userId` = $userId and `createDay`=$createDay");
        $check = server('Db')->query("delete from ecg where `createDay`= $createDay");
        return $check?(unlink($savePath)?200:-200):-200;
    }

    //上传ecg测量记录   调用model('Upload)->returnMsg()显示msg信息
    //必须经过model('Gate')->verifyToken()
    //单文件上传
    public function insertEcgLog($file,$req)
    {
        //上传心电文件
        $config = server()->Config('Config')['uploadEcg'];
        $pathOrCode=model('Upload',$config)->upload($file,'No');
        if(!is_string($pathOrCode)) return $pathOrCode;
        //上传成功存储数据库
        $req['story']['userId'] = bus('tokenInfo')['userId'];
        $req['story']['savePath'] = $pathOrCode;
        $check = server('Db')->autoExecute('ecg',$req['story'], 'INSERT');
        $code = $check?200:-202;
        return $code;
    }

}