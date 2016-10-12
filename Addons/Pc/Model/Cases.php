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
        $sql = "select `disease`,`medication`,`sideEffect`,`beginTime`,`endTime` from `case` where `userId`={$userId} and `orgId`={$orgId} and active=1";
        $cases = server('Db')->getAll($sql);
        return $cases?:[];
    }

    public function insertInvalidCases($req)
    {
        $req =saddslashes($req);
        $req['active']=0;
        $insert = server('Db')->autoExecute('`case`', $req, 'INSERT');
        return $insert?true:false;
    }

    public function deleteCases($caseId)
    {
        $caseId = intval($caseId);
        $check = server('Db')->query("delete from `case` where `caseId`={$caseId}");
        return $check?true:false;
    }

    //批量添加病例
    public function batchInsertCases(Array $cases,$userId)
    {
        $userId = intval($userId);
        foreach($cases as $k=>$v){
            $cases[$k]['userId'] = $userId;
        }
        return model('Batchinsert')->batchInsert($cases,'case');
    }

    //更新病历active=1;
    public function updateCasesActiveByUserId($userId)
    {
        $userId = intval($userId);
        $check = server('Db')->query("update `case` set active=1 where userId={$userId}");
        return $check?true:false;
    }
}