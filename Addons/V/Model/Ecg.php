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
    /**
     * 按时间戳删除心电记录
     * @param $time
     *@return boolean
     */
    public function deleteEcgLogByTimestamp($time)
    {
        $time = intval($time);
        $userId = bus('tokenInfo')['userId'];
        $savePath = server('Db')->query("select `savePath` from ecg where `userId` = $userId and `time`=$time");
        $check = server('Db')->query("delete from ecg where `time`= $time");
        return $check?(unlink($savePath)?true:false):false;
    }

    /**
    * 按日期删除心电记录
    * @param $createDay
    * 20160823
    *@return boolean
    */
    public function deleteEcgLogByDate($createDay)
    {
        $createDay = intval($createDay);
        $userId = bus('tokenInfo')['userId'];
        $savePath = server('Db')->query("select `savePath` from ecg where `userId` = $userId and `createDay`=$createDay");
        $check = server('Db')->query("delete from ecg where `createDay`= $createDay");
        return $check?(unlink($savePath)?true:false):false;
    }

    /**
     * 插入心电记录
     * @param $file
     * @param $req
     *@return boolean
     * TODO:待修改
     */
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
        $check = $check?true:false;
        return $check;
    }

}