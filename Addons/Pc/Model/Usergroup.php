<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-23
 * Time: 15:25
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

class Usergroup implements ModelInterface
{
    public function depend()
    {
        return[
          'Server::Db'
        ];
    }

    /**
     * 获取用户组map集合
     * @return array
     */
    public function getMapUserGroup()
    {
       $map = server('Db')->getMap("select `chr`,`groupId` from user_group where active=1");
       return $map?:[];
    }

    public function getMapDoctorAndNurse()
    {
        $map = $this->getMapUserGroup();
        $group = array();
        $groupString = '';
        if($map){
            $group['nurseId'] = $map['nurse'];
            $group['doctorId'] = $map['doctor'];
        }
        if(!empty($group)){
            $groupString = '('.implode(',',$group).')';
        }
        return $groupString;
    }

    public function getMapPatient()
    {
        $map = $this->getMapUserGroup();
        $group = array();
        $groupString = '';
        if($map){
            $group['ios'] = $map['ios'];
            $group['android'] = $map['android'];
        }
        if(!empty($group)){
            $groupString = '('.implode(',',$group).')';
        }
        return $groupString;
    }
}