<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-10
 * Time: 10:28
 */

namespace Addons\Model;


class Organization
{
    //通过机构id获取机构名称
    public function  getOrgNameByOrgId($orgId)
    {
        $orgId = intval($orgId);
        $orgName = server('Db')->getOne("select orgName from organization where `orgId`={$orgId}");
        return $orgName?:'';
    }
}