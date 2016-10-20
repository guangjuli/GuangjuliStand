<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-19
 * Time: 11:57
 */

namespace Addons\Model;


class Version
{
    private $type = ['pc','android','ios'];     //默认设备类型

    //获取最新版本
    public function getNewVersion($type)
    {
        $row = server('Db')->getRow("select v_min,prompt,isForceUpdate,url from version where v_min = (select max(v_min) from version) and type='{$type}'");
        return $row?:[];
    }
    //获取当前版本信息
    public function getCurrentVersion($v_min,$type)
    {
        $current = server('Db')->getRow("select v_min from version where v_min='{$v_min}' and type='{$type}'");
        return $current?:[];
    }

    //比较版本信息及是否强制更新
    public function isUpdateVersion($req)
    {
        $req = saddslashes($req);
        $current = $this->getCurrentVersion($req['v_min'],$req['type']);
        $new = $this->getNewVersion($req['type']);
        return $current['v_min']<$new['v_min']?$new:[];
    }

    public function validate($req)
    {
        return in_array($req['type'],$this->type)?true:false;
    }
}