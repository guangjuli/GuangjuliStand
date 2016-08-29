<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 9:04
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Ecg  implements ModelInterface
{
    public function depend()
    {
        return[
          'Server::Db',
          'Model::Upload',
        ];
    }

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
        $config = server()->Config('V')['uploadEcg'];
        $code=model('Upload',$config)->upload($file);
        if($code!=200)return $code;
        $path = model('Upload',$config)->uploadPath('No');
        //上传成功存储数据库
        $req['story']['userId'] = bus('tokenInfo')['userId'];
        $req['story']['savePath'] = $path;
        $check = server('Db')->autoExecute('ecg',$req['story'], 'INSERT');
        $check = $check?true:false;
        return $check;
    }

}