<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-09
 * Time: 10:37
 */

namespace Addons\Model;


class Measuretype
{
    public function getMeasureTypeMap()
    {
        $map = server('Db')->getMap("select `chr`,`des` from `measure_type` where active =1");
        return $map?:[];
    }
}