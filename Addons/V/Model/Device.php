<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-17
 * Time: 17:33
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Device implements ModelInterface
{
    public function depend()
    {
        return[
          'Server::Db'
        ];
    }


    /**
     * 返回文本信息显示
     * @param int $code
     *@return string
     */
    public function returnMsg($code=null)
    {
        $msg = [
            200=>'succeed',
            -201=>'必填参数不能为空',
            -202=>'该用户不存在',
            -203=>'该设备已存在'
        ];
        return $msg[$code];
    }


    /**
     * 插入设备校验请求参数,调用returnMsg()显示文本信息
     * @param array $array
     *@return int
     */
    public function insertDeviceValidateReq(Array $array)
    {
        $fields = ['userId','device','deviceTypeId'];
        //参数存在性
        if(!model('Validate')->validateParams($fields,$array))return -201;
        //userId对应的用户是否存在
        if(!model('User')->isExistUserByUserId($array['userId'])) return -202;
        //该设备是否已经存在
        if($this->isExistDevice($array['device'])) return -203;
        return 200;
    }
    /**
     * 插入设备
     * @param $array
     *@return boolean
     */
    public function insertDevice(Array $array)
    {
        //执行sql
        $insert = server('Db')->autoExecute('device', $array, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    public function getDeviceTypeMap()
    {
        $map = server('Db')->getMap("select deviceTypeId,type from device_type");
        return $map?$map:[];
    }

    /**
     * 根据设备编号获取设备信息
     * @param string $device
     *@return array
     */
    public function getDeviceInfoByDevice($device)
    {
        //参数校验
        $device = is_string($device);
        if(empty($device)) return [];
        //执行sql
        $deviceInfo = server('Db')->getRow("select * from device where `device`='$device'");
        $deviceInfo = $deviceInfo?:[];
        return $deviceInfo;
    }

    /**
     * 根据设备编号判断设备是否存在
     * @param string $device
     *@return boolean
     */
    public function isExistDevice($device)
    {
        $deviceInfo = $this->getDeviceInfoByDevice($device);
        return empty($deviceInfo)?false:true;
    }
}