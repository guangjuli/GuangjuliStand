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
     * @param int $time
     * @param int $userId
     *@return boolean
     */
    public function deleteEcgLogByTimestamp($time,$userId=null)
    {
        $time = intval($time);
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        //获取心电图存储的文件路径
        $savePath = server('Db')->getOne("select `savePath` from ecg where `userId` = $userId and `time`=$time");
        //删除数据库记录并删除对应的文件
        $check = server('Db')->query("delete from ecg where `time`= $time");
        return $check?(unlink($savePath)?true:false):false;
    }

    /**
    * 按日期删除心电记录
    * @param int $createDay
    * 20160823
    * @param  int $userId
    *@return boolean
    */
    public function deleteEcgLogByDate($createDay,$userId=null)
    {
        $createDay = intval($createDay);
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        //获取心电图存储的路径
        $savePath = server('Db')->getAll("select `savePath` from ecg where `userId` = $userId and `createDay`=$createDay");
        //删除数据库存储的记录
        $check = server('Db')->query("delete from ecg where `userId` = $userId and `createDay`=$createDay");
        //删除心电文件
        foreach($savePath as $v){
            if(file_exists($v['savePath']))@unlink($v['savePath']);
        }
        return $check?true:false;
    }

    /**
     * 插入心电记录，上传后执行插入操作
     * @param array $req
     * $req中包含键值对：userId,time,createDay
     *@return boolean
     */
    public function insertEcgLog($req)
    {
        //获取文件存储路径
        $config = server()->Config('V')['uploadEcg'];
        $path = model('Upload',$config)->uploadPath('No');
        //上传成功存储数据库
        $req['userId'] = $req['userId']?:bus('tokenInfo')['userId'];
        $req['savePath'] = $path;
        $check = server('Db')->autoExecute('ecg',$req['story'], 'INSERT');
        $check = $check?true:false;
        return $check;
    }


    /**
     * 上传心电记录
     * @param $file
     *@return int
     */
    public function uploadEcg($file)
    {
        //上传心电文件
        $config = server()->Config('V')['uploadEcg'];
        $code=model('Upload',$config)->upload($file);
        return $code;
    }

    /**
     * 根据时间戳获取心电记录
     * @param int $time
     * @param int $userId
     *@return array
     */
    public function getEcgInfoByTime($time,$userId=null)
    {
        $time = intval($time);
        $userId = intval($userId)?:bus('tokenInfo')['userId'];
        if(empty($time)||empty($userId)) return [];
        $ecgInfo = server('Db')->getRow("select * from ecg where `userId`= $userId and `time` = $time");
        return $ecgInfo?:[];
    }


}