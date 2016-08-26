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
        // TODO: Implement depend() method.
    }
    /**
     * 插入设备
     * @param $array
     *@return boolean
     */
    public function insertDevice(Array $array)
    {
        $insert = server('Db')->autoExecute('device', $array, 'INSERT');
        $check = $insert?true:false;
        return $check;
    }

    public function getDeviceTypeMap()
    {
        $map = server('Db')->getMap("select deviceTypeId,type from device_type");
        return $map?$map:[];
    }
}