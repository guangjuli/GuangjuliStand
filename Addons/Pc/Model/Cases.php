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
    public function getPersonalCases($userId,$orgId)
    {
        $userId = intval($userId);
        $cases = server('Db')->getAll("select `disease`,`medication`,`sideEffect`,`beginTime`,`endTime` from case where `userId`={$userId} and `orgId`={$orgId}");
        return $cases?:[];
    }
}