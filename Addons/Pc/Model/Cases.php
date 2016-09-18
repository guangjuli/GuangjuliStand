<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-14
 * Time: 9:09
 */

namespace Addons\Model;

//患者病历
class Cases
{
    //case 病历
    public function getCasesByUserId($userId)
    {
        $userId = intval($userId);
        $cases = server('Db')->getAll("select `disease`,`medication`,`sideEffect`,`beginTime`,`endTime` from case where `userId`={$userId}");
        return $cases?:[];
    }
}