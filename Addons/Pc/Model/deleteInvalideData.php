<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-26
 * Time: 11:14
 */

namespace Addons\Model;


class deleteInvalidData
{
    //需要定期删除无效数据
    public function deleteInvalidData()
    {
    //删除user表
        $this->deleteData('user');
    //删除联系人表
        $this->deleteData('contacts');
    //删除测量计划表
        $this->deleteData('measure_plan');
    //删除疾病列表
        $this->deleteData('case');
    }
    private function deleteData($table)
    {
        $check = server('Db')->query("delete from `{$table}` where active=0");
        return $check?true:false;
    }
}